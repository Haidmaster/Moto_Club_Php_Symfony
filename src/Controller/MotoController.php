<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotoController extends AbstractController
{
    #[Route('/moto', name: 'app_moto')]
    public function index(): Response
    {
        return $this->render('moto/index.html.twig', [
            'controller_name' => 'MotoController',
        ]);
    }
}
