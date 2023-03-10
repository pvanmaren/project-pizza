<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class guestController extends AbstractController
{
    #[Route('/', name: 'homepage')]
public function showHome():Response{
    return $this->render('bezoeker/home.html.twig');
}




}