<?php

namespace App\Controller;

use App\Entity\Materiel;
use App\Form\MaterielType;
use App\Repository\MaterielRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/materiel')]
class MaterielController extends AbstractController
{
   // #[Route('/', name: 'materiel_index', methods: ['GET'])]
   /**
     * @Route("/", name="materiel_index")
     */ 
   public function index(MaterielRepository $materielRepository): Response
    {
        return $this->render('materiel/index.html.twig', [
            'materiels' => $materielRepository->findAll(),
        ]);
    }

    //#[Route('/new', name: 'materiel_new', methods: ['GET', 'POST'])]
     /**
     * @Route("/new", name="materiel_index")
     */ 
    public function new(Request $request): Response
    {
            $materiel = new Materiel();
            $form = $this->createForm(MaterielType::class, $materiel);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($materiel);
                $entityManager->flush();

                return $this->redirectToRoute('materiel_index', [], Response::HTTP_SEE_OTHER);
            }

        return $this->renderForm('materiel/new.html.twig', [
            'materiel' => $materiel,
            'form' => $form,
        ]);
    }

    //#[Route('/{id}', name: 'materiel_show', methods: ['GET'])]
     /**
     * @Route("/{id}", name="materiel_show")
     */ 
    public function show(Materiel $materiel): Response
    {
        return $this->render('materiel/show.html.twig', [
            'materiel' => $materiel,
        ]);
    }

    //#[Route('/{id}/edit', name: 'materiel_edit', methods: ['GET', 'POST'])]
     /**
     * @Route("/{id}/edit", name="materiel_edit")
     */ 
    public function edit(Request $request, Materiel $materiel): Response

    {
        $form = $this->createForm(MaterielType::class, $materiel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('materiel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('materiel/edit.html.twig', [
            'materiel' => $materiel,
            'form' => $form,
        ]);
    }

    //#[Route('/{id}', name: 'materiel_delete', methods: ['POST'])]
     /**
     * @Route("/{id}", name="materiel_delete")
     */ 
    public function delete(Request $request, Materiel $materiel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$materiel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($materiel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gestionmateriel', [], Response::HTTP_SEE_OTHER);
    }
}
