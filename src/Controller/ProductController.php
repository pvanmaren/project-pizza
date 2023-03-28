<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
    #[Route('/products/{id}')]
    public function products(ManagerRegistry $doctrine) :Response {
        $categories=$doctrine->getRepository(Category::class)->findAll();
        return $this->render('bezoeker/products.html.twig',['categories'=>$categories]);
    }
}