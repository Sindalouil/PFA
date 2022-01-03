<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DemandeRepository;

class UtilisateurController extends AbstractController
{
  //  #[Route('/utilisateur', name: 'utilisateur')]
    
  /**
     * @Route("/utilisateur", name="utilisateur")
     */
  public function index(DemandeRepository $demandeRepository): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'demandes' => $demandeRepository->findAll(),
        ]);
    }
}
