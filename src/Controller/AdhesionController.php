<?php

namespace App\Controller;

use App\Entity\Adhesion;
use App\Repository\AdhesionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/adhesion', name: 'adhesion_', methods: ['GET'])]
class AdhesionController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(AdhesionRepository $adhesionRepository): Response
    {
        return $this->render('adhesion/index.html.twig', [
            'adhesions' => $adhesionRepository->findAll()
        ]);
    }
    #[Route('/details/{id}', name: 'show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Adhesion $adhesion): Response
    {

        return $this->render('adhesion/show.html.twig', [
            'adhesion' => $adhesion
        ]);
    }

    #[Route('/creation', name: 'create', methods: ['GET', 'POST'])]
    public function create(): Response
    {
        dd(__METHOD__);
    }
    #[Route('/edition/{id}', name: 'edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(): Response
    {
        dd(__METHOD__);
    }
    #[Route('/suppresion/{id}', name: 'delete', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function delete(): Response
    {
        dd(__METHOD__);
    }
}
