<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Form\DemandeType;
use App\Repository\DemandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// #[Route('/demande')]
/**
     * @Route("/demande", name="demande_index")
     */
class DemandeController extends AbstractController
{
   // #[Route('/', name: 'demande_index', methods: ['GET'])]
    /**
     * @Route("/", name="demande_index")
     */
    
    public function index(DemandeRepository $demandeRepository): Response
    {
        return $this->render('demande/index.html.twig', [
            'demandes' => $demandeRepository->findAll(),
        ]);
    }

    // #[Route('/new', name: 'demande_new', methods: ['GET', 'POST'])]
    /**
     * @Route("/new", name="demande_new")
     */
    public function new(Request $request): Response
    {
        $demande = new Demande();
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();

            return $this->redirectToRoute('demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    //#[Route('/{id}', name: 'demande_show', methods: ['GET'])]
    /**
     * @Route("/{id}", name="demande_show")
     */
    public function show(Demande $demande): Response
    {
        return $this->render('demande/show.html.twig', [
            'demande' => $demande,
        ]);
    }

    // #[Route('/{id}/edit', name: 'demande_edit', methods: ['GET', 'POST'])]
     /**
     * @Route("/{id}/edit", name="demande_edit")
     */
    public function edit(Request $request, Demande $demande): Response
    {
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande/edit.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    //#[Route('/{id}', name: 'demande_delete', methods: ['POST'])]
     /**
     * @Route("/{id}", name="demande_delete")
     */
    public function delete(Request $request, Demande $demande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demande->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($demande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('demande_index', [], Response::HTTP_SEE_OTHER);
    }
}
