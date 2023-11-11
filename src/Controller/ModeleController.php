<?php

namespace App\Controller;


use App\Entity\Modele;
use App\Form\MarqueType;
use App\Form\ModeleType;
use App\Repository\ModeleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/modele', name: 'modele_', methods: ['GET'])]
class ModeleController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ModeleRepository $modeleRepository): Response
    {
        return $this->render('modele/index.html.twig', [
            'modeles' => $modeleRepository->findAll()
        ]);
    }
    #[Route('/details/{id}', name: 'show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Modele $modele): Response
    {

        return $this->render('modele/show.html.twig', [
            'modele' => $modele
        ]);
    }

    #[Route('/creation', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request, ModeleRepository $repo): Response
    {
        $modele = new Modele();
        $form = $this->createForm(ModeleType::class, $modele);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repo->save($modele, true);
            $this->addFlash('success', 'Le modèle a bien été ajouté.');
            return $this->redirectToRoute('modele_index');
        }
        return $this->render('modele/create.html.twig', [
            'formView' => $form->createView(),
        ]);
    }

    #[Route('/edition/{id}', name: 'edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(Request $request, Modele $modele, ModeleRepository $repo): Response
    {
        $form = $this->createForm(MarqueType::class, $modele);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repo->save($modele, true);
            return $this->redirectToRoute('modele_index');
        }
        return $this->render('modele/edit.html.twig', [
            'formView' => $form->createView(),
        ]);
    }
    #[Route('/delete/{id}', name: 'delete', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function delete(Modele $modele, ModeleRepository $repo): Response
    {
        $repo->remove($modele, true);
        return $this->redirectToRoute('modele_index');
    }
}
