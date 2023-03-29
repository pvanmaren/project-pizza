<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Order;
use App\Entity\Product;
use App\Form\OrderType;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    #[Route('/order/{id}', name: 'order')]
    public function Order(Request $request, EntityManagerInterface $em, $id): Response
    {
        $pizza = $em->getRepository(Product::class)->find($id);
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $order->setProduct($pizza);
            $em->persist($order);
            $em->flush();

            $this->addFlash('succes', 'Uw bestelling is doorgestuurd!');
            //  return $this->redirectToRoute('app_index');
        }

        return $this->renderForm('bezoeker/order.html.twig', [
            'controller_name' => 'PizzaController',
            'orderForm' => $form

        ]);
    }


    #[Route('/login', name: 'login')]
    public function login(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findAll();
        return $this->render('bezoeker/login.html.twig',
            ['orders' => $orders]);
    }
}

