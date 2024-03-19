<?php

namespace App\Controller;

use App\Entity\PointCarte;
use App\Form\PointCarteType;
use App\Repository\PointCarteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('adminpanel/mappoint')]
class PointCarteController extends AbstractController
{
    #[Route('/', name: 'app_point_carte_index', methods: ['GET'])]
    public function index(PointCarteRepository $pointCarteRepository): Response
    {
        return $this->render('point_carte/index.html.twig', [
            'point_cartes' => $pointCarteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_point_carte_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pointCarte = new PointCarte();
        $form = $this->createForm(PointCarteType::class, $pointCarte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pointCarte);
            $entityManager->flush();

            return $this->redirectToRoute('app_point_carte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('point_carte/new.html.twig', [
            'point_carte' => $pointCarte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_point_carte_show', methods: ['GET'])]
    public function show(PointCarte $pointCarte): Response
    {
        return $this->render('point_carte/show.html.twig', [
            'point_carte' => $pointCarte,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_point_carte_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PointCarte $pointCarte, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PointCarteType::class, $pointCarte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_point_carte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('point_carte/edit.html.twig', [
            'point_carte' => $pointCarte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_point_carte_delete', methods: ['POST'])]
    public function delete(Request $request, PointCarte $pointCarte, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pointCarte->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pointCarte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_point_carte_index', [], Response::HTTP_SEE_OTHER);
    }
}
