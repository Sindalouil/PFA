<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoututilisateuController extends AbstractController
{
   // #[Route('/Admin/ajoututilisateu', name: 'ajoututilisateu')]
   /**
     * @Route("/Admin/ajoututilisateu", name="ajoututilisateu")
     */
    public function index(): Response
    {
        return $this->render('ajoututilisateu/index.html.twig', [
            'controller_name' => 'AjoututilisateuController',
        ]);
    }
}
