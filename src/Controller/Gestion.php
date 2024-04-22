<?php 
// src/Controller/ProductController.php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Lawyer;
use App\Entity\Judge;
use App\Entity\Greffier;




class Gestion extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/', name: 'signin_signup', methods: ['GET'])]
    public function signin(): Response
    {
        return $this->render('signin_signup_page.html.twig', [
            
        ]);
    }

    #[Route('/', name: 'signup', methods: ['POST'])]
    public function store(Request $request): Response
    {
        // Retrieve form data
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $confirmpassword = $request->request->get('confirmpassword');
        $role = $request->request->get('role');


        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword) || empty($role)) {
            // Handle empty fields 
            return $this->redirectToRoute('signin_signup', ['error' => 'All fields are required']);
        }

        // check pass
        if ($password !== $confirmpassword) {
            return $this->redirectToRoute('signin_signup', ['error' => 'Password and confirm password do not match']);
        }
        
        //user ela hssab role
        if ($role === 'lawyer') {
            $user = new Lawyer();
        } elseif ($role === 'judge') {
            $user = new Judge();
        } elseif ($role === 'greffier') {
            $user = new Greffier();
        } else {
            // Default to User entity if role is not recognized
            $user = new User();
        }

        // user jdid
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->redirectToRoute('signin_signup');
    }




}

?>