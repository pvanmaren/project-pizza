<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class guestController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function products(ManagerRegistry $doctrine) :Response {
        $products=$doctrine->getRepository(Category::class)->findAll();
        return $this->render('bezoeker/home.html.twig',['products'=>$products]);
    }
}
