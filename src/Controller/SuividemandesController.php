<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuividemandesController extends AbstractController
{
   // #[Route('/suividemandes', name: 'suividemandes')]
    
   /**
     * @Route("/suividemandes", name="suividemandes")
     */
   
   public function index(): Response
    {
        return $this->render('suividemandes/index.html.twig', [
            'controller_name' => 'SuividemandesController',
        ]);
    }
}
