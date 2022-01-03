<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionpronlemeController extends AbstractController
{
  //  #[Route('/gestionpronleme', name: 'gestionpronleme')]
    /**
     * @Route("/gestionpronleme", name="gestionpronleme")
     */
  
  
  public function index(): Response
    {
        return $this->render('gestionpronleme/index.html.twig', [
            'controller_name' => 'GestionpronlemeController',
        ]);
    }
}
