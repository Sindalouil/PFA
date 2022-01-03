<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeclareproblemController extends AbstractController
{
   // #[Route('/User/declareproblem', name: 'declareproblem')]
   /**
     * @Route("/User/declareproblem", name="declareproblem")
     */
   public function index(): Response
    {
        return $this->render('declareproblem/index.html.twig', [
            'controller_name' => 'DeclareproblemController',
        ]);
    }
}
