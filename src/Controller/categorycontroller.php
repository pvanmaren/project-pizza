<?php

namespace App\Controller;

use http\Env\Response;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation;

class categorycontroller
{
    #[Route('/category', name: 'categorypage')]

    public function showContact():Response
    {
        return $this->render('bezoeker/bestellen.html.twig');


    }
}