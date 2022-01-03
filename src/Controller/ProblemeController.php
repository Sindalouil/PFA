<?php

namespace App\Controller;

use App\Entity\Probleme;
use App\Form\ProblemeType;
use App\Repository\ProblemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/probleme')]
class ProblemeController extends AbstractController
{
  //  #[Route('/', name: 'probleme_index', methods: ['GET'])]
    
  /**
     * @Route("/", name="probleme_index")
     */
  
  public function index(ProblemeRepository $problemeRepository): Response
    {
        return $this->render('probleme/index.html.twig', [
            'problemes' => $problemeRepository->findAll(),
        ]);
    }

   // #[Route('/new', name: 'probleme_new', methods: ['GET', 'POST'])]
   /**
     * @Route("/new", name="probleme_new")
     */
    public function new(Request $request): Response
    {
        $probleme = new Probleme();
        $form = $this->createForm(ProblemeType::class, $probleme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($probleme);
            $entityManager->flush();

            return $this->redirectToRoute('probleme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('probleme/new.html.twig', [
            'probleme' => $probleme,
            'form' => $form,
        ]);
    }

   // #[Route('/{id}', name: 'probleme_show', methods: ['GET'])]
   /**
     * @Route("/{id}", name="probleme_show")
     */
    public function show(Probleme $probleme): Response
    {
        return $this->render('probleme/show.html.twig', [
            'probleme' => $probleme,
        ]);
    }

   // #[Route('/{id}/edit', name: 'probleme_edit', methods: ['GET', 'POST'])]
   /**
     * @Route("/{id}/edit", name="probleme_edit")
     */
    public function edit(Request $request, Probleme $probleme): Response
    {
        $form = $this->createForm(ProblemeType::class, $probleme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('probleme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('probleme/edit.html.twig', [
            'probleme' => $probleme,
            'form' => $form,
        ]);
    }

    //#[Route('/{id}', name: 'probleme_delete', methods: ['POST'])]
    /**
     * @Route("/{id}", name="probleme_delete")
     */
    public function delete(Request $request, Probleme $probleme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$probleme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($probleme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('probleme_index', [], Response::HTTP_SEE_OTHER);
    }
}
