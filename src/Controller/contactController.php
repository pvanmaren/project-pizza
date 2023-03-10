<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class contactController extends AbstractController
{
    #[Route('/contact', name: 'contactpage')]

    public function showContact():Response{
        return $this->render('bezoeker/contact.html.twig');


    }
}