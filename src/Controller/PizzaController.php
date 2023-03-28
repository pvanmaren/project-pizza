<?php

namespace App\Controller;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    #[Route("/pizzas/{id}", name: "pizzas")]
public function showPizza(EntityManagerInterface $entityManager, int $id)
{
}
}