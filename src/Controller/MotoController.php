<?php

namespace App\Controller;

use App\Entity\Moto;
use App\Repository\MotoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/moto', name: 'moto_', methods: ['GET'])]
class MotoController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(MotoRepository $motoRepository): Response
    {
        return $this->render('moto/index.html.twig', [
            'motos' => $motoRepository->findAll()
        ]);
    }
    #[Route('/details/{id}', name: 'show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Moto $moto): Response
    {

        return $this->render('moto/show.html.twig', [
            'moto' => $moto
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
    #[Route('/suppression/{id}', name: 'delete', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function delete(): Response
    {
        dd(__METHOD__);
    }
}