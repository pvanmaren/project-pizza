<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products')]
    public function products(ManagerRegistry $doctrine) :Response {
        $products=$doctrine->getRepository(Product::class)->findAll();
        return $this->render('bezoeker/products.html.twig',['products'=>$products]);
    }
}