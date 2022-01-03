<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuivipretController extends AbstractController
{
   // #[Route('/suivipret', name: 'suivipret')]
    /**
     * @Route("/suivipret", name="suivipret")
     */
   
   public function index(): Response
    {
        return $this->render('suivipret/index.html.twig', [
            'controller_name' => 'SuivipretController',
        ]);
    }
}
