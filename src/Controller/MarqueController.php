<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Repository\MarqueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MarqueController extends AbstractController
{
    #[Route('/marque', name: 'marque_index', methods: ['GET'])]
    public function index(MarqueRepository $marqueRepository): Response
    {


        return $this->render('marque/index.html.twig', [
            'marques' => $marqueRepository->findAll()
        ]);
    }
    #[Route('/marque/details/{id}', name: 'marque_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Marque $marque): Response
    {

        return $this->render('marque/show.html.twig', [
            'marque' => $marque
        ]);
    }

    #[Route('/creation', name: 'marque_create', methods: ['GET', 'POST'])]
    public function create(): Response
    {
        dd(__METHOD__);
    }
    #[Route('/edition/{id}', name: 'marque_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(): Response
    {
        dd(__METHOD__);
    }
    #[Route('/delete/{id}', name: 'marque_delete', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function delete(): Response
    {
        dd(__METHOD__);
    }
}
