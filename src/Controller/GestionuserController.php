<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GestionuserController extends AbstractController
{

    
    /**
     * @Route("/Admin/gestionuser", name="gestionuser")
     */
    public function new(Request $request,UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('gestionuser', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gestionuser/index.html.twig', [
            'user' => $user,
            'form' => $form,
            'users' => $userRepository->findAll(),
            
        ]);
    }
    //     #[Route('/Admin/gestionuser', name: 'gestionuser')]
    //     public function index(): Response
    //     {
    //         return $this->render('gestionuser/index.html.twig', [
    //             'controller_name' => 'GestionuserController',
    //         ]);
    // }
   
}
