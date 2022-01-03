<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Materiel;
use App\Form\MaterielType;
use App\Repository\MaterielRepository;
use Symfony\Component\HttpFoundation\Request;

class GestionmaterielController extends AbstractController
{
  //  #[Route('/Admin/gestionmateriel', name: 'gestionmateriel', methods: ['GET', 'POST'])]
    
  /**
     * @Route("/Admin/gestionmateriel", name="gestionmateriel")
     */
  
  public function new(Request $request, MaterielRepository $materielRepository ): Response
    {
            $materiel = new Materiel();
            $form = $this->createForm(MaterielType::class, $materiel);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($materiel);
                $entityManager->flush();

                return $this->redirectToRoute('gestionmateriel', [], Response::HTTP_SEE_OTHER);
            }

        return $this->renderForm('gestionmateriel/index.html.twig', [
            'materiel' => $materiel,
            'form' => $form, 
            'materiels' => $materielRepository->findAll(),
        ]);
    }
}
