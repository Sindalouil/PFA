<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionpretsController extends AbstractController
{
   // #[Route('/gestionprets', name: 'gestionprets')]
    /**
     * @Route("/gestionprets", name="gestionprets")
     */
   
   public function index(): Response
    {
        return $this->render('gestionprets/index.html.twig', [
            'controller_name' => 'GestionpretsController',
        ]);
    }
}
