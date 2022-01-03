<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestioncomposantsController extends AbstractController
{
   // #[Route('/User/gestioncomposants', name: 'gestioncomposants')]
    
   /**
     * @Route("/User/gestioncomposants", name="gestioncomposants")
     */
   
   public function index(): Response
    {
        return $this->render('gestioncomposants/index.html.twig', [
            'controller_name' => 'GestioncomposantsController',
        ]);
    }
}
