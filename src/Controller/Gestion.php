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
use PhpParser\Node\Stmt\Echo_;

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
        // nakhdou data men form
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $confirmpassword = $request->request->get('confirmpassword');
        $role = $request->request->get('role');

        if (empty($name) || empty($email) || empty($password) || empty($confirmpassword) || empty($role)) {
            $this->addFlash('error', 'All fields are required.');
            return $this->redirectToRoute('signin_signup');
        }

        if ($password !== $confirmpassword) {
            $this->addFlash('error', 'Passwords do not match.');
            return $this->redirectToRoute('signin_signup');
        }

    
        //user ela hssab role 
        if ($role === 'lawyer') {
            $user = new Lawyer();
        } elseif ($role === 'judge') {
            $user = new Judge();
        } elseif ($role === 'greffier') {
            $user = new Greffier();
        } else {

        }

        // user jdid
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $this->addFlash('success', 'Signup successful! Now you can sign in.');


        return $this->redirectToRoute('signin_signup');
    }




}

?>