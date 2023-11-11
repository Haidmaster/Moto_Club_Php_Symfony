<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Proxies\__CG__\App\Entity\Marque as EntityMarque;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route('/marque', name: 'marque_', methods: ['GET'])]
class MarqueController extends AbstractController
{

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(MarqueRepository $repo): Response
    {
        return $this->render('marque/index.html.twig', [
            'marques' => $repo->findAll()
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

        if ($form->isSubmitted() && $form->isValid()) {
            $repo->save($marque, true);
            return $this->redirectToRoute('marque_index');
        }

        return $this->render('marque/create.html.twig', [
            'formView' => $form->createView(),
        ]);
    }
    #[Route('/edition/{id}', name: 'edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(Marque $marque, Request $request, MarqueRepository $repo): Response
    {
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repo->save($marque, true);
            return $this->redirectToRoute('marque_index');
        }
        return $this->render('marque/edit.html.twig', [
            'formView' => $form->createView(),
        ]);
    }
    #[Route('/suppression/{id}', name: 'delete', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function delete(Marque $marque, MarqueRepository $repo): Response    {

        $repo->remove($marque, true);
        return $this->redirectToRoute('marque_index');
    }
}
