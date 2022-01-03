<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DeclareloanController extends AbstractController
{
   
   // #[Route('/User/declareloan', name: 'declareloan')]

    /**
     * @Route("/User/declareloan", name="declareloan")
     */
    public function index(): Response
    {
        return $this->render('declareloan/index.html.twig', [
            'controller_name' => 'DeclareloanController',
        ]);
    }
    
    
}
