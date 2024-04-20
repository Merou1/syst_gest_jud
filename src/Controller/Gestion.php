<?php 
// src/Controller/ProductController.php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;



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
    #[Route('/products/create', name: 'product_create', methods: ['GET'])]
    public function create(): Response
    {
        return $this->render('create.html.twig');
    }



}

?>