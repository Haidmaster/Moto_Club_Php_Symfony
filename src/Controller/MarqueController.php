<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route('/marque', name: 'marque_', methods: ['GET'])]
class MarqueController extends AbstractController
{

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(MarqueRepository $marqueRepository): Response
    {
        return $this->render('marque/index.html.twig', [
            'marques' => $marqueRepository->findAll()
        ]);
    }
    #[Route('/details/{id}', name: 'show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Marque $marque): Response
    {

        return $this->render('marque/show.html.twig', [
            'marque' => $marque
        ]);
    }

    #[Route('/creation', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request, MarqueRepository $repo): Response
    {

        $marque = new Marque();

        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $repo->save($marque, true);
            return $this->redirectToRoute('marque_index');
        }

        return $this->render('marque/create.html.twig', [
            'form' => $form->createView(),
        ]);

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
