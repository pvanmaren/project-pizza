<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Order;
use App\Entity\Product;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class guestController extends AbstractController
{

    #[Route("/", name: "home")]
    public function showHome(EntityManagerInterface $entityManager)
    {
        $categories = $entityManager->getRepository(Category::class)->findAll();
        return $this->render("bezoeker/home.html.twig", ['categories' => $categories]);

    }

    #[Route("/contact", name: "contact")]
    public function showContact()
    {
        return $this->render("contact.html.twig");
    }

    #[Route("/pizzas/{id}", name: "pizzas")]
    public function showPizzas(EntityManagerInterface $entityManager, int $id)
    {
        $category = $entityManager->getRepository(Category::class)->find($id);
        return $this->render("bezoeker/pizzas.html.twig", [
            'category' => $category
        ]);
    }

    #[Route("/order/{id}", name: "order")]
    public function showOrder(EntityManagerInterface $entityManager, Request $request, int $id)
    {
        $pizza = $entityManager->getRepository(Product::class)->find($id);
        $order = new Order();

        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $order->setPizza($pizza);
            $entityManager->persist($order);
            $entityManager->flush();
            $this->addFlash('success' , 'merry christmas' );
            return $this->redirectToRoute('contact');


        }

        return $this->render("order.html.twig", [
            'pizza' => $pizza,
            'form' => $form,
        ]);

    }

}