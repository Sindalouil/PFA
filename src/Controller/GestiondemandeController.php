<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DemandeRepository;

class GestiondemandeController extends AbstractController
{
    // #[Route('/Admin/gestiondemande', name: 'gestiondemande')]
     /**
     * @Route("/gestiondemande", name="gestiondemande")
     */
    public function index(DemandeRepository $demandeRepository): Response
    {
        return $this->render('gestiondemande/index.html.twig', [
            'demandes' => $demandeRepository->findAll(),
        ]);
    }
}
