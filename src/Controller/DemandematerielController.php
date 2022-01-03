<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Demande;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DemandeRepository;
use App\Form\DemandeType;




class DemandematerielController extends AbstractController
{
    
   // #[Route('/User/demandemateriel', name: 'demandemateriel')]
    
   /**
     * @Route("/User/demandemateriel", name="demandemateriel")
     */
   
   public function new(Request $request , DemandeRepository $demandeRepository): Response
    {
        $demande = new Demande();
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();

            return $this->redirectToRoute('gestioncomposants', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandemateriel/index.html.twig', [
            'demande' => $demande,
            'form' => $form,
            'demandes' => $demandeRepository->findAll(),
        ]);
    }
    // public function index(): Response
    // {
    //     return $this->render('demandemateriel/index.html.twig', [
    //         'controller_name' => 'DemandematerielController',
    //     ]);
    // }
}
