<?php

namespace App\Controller;

use App\Entity\EquipmentsMinusTwo;
use App\Form\EquipmentsMinusTwoType;
use App\Repository\EquipmentsMinusTwoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('adminpanel/equipments2')]
class EquipmentsMinusTwoController extends AbstractController
{
    #[Route('/', name: 'app_equipments_minus_two_index', methods: ['GET'])]
    public function index(EquipmentsMinusTwoRepository $equipmentsMinusTwoRepository): Response
    {
        return $this->render('equipments_minus_two/index.html.twig', [
            'equipments_minus_twos' => $equipmentsMinusTwoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_equipments_minus_two_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $equipmentsMinusTwo = new EquipmentsMinusTwo();
        $form = $this->createForm(EquipmentsMinusTwoType::class, $equipmentsMinusTwo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($equipmentsMinusTwo);
            $entityManager->flush();

            return $this->redirectToRoute('app_equipments_minus_two_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equipments_minus_two/new.html.twig', [
            'equipments_minus_two' => $equipmentsMinusTwo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_equipments_minus_two_show', methods: ['GET'])]
    public function show(EquipmentsMinusTwo $equipmentsMinusTwo): Response
    {
        return $this->render('equipments_minus_two/show.html.twig', [
            'equipments_minus_two' => $equipmentsMinusTwo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_equipments_minus_two_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EquipmentsMinusTwo $equipmentsMinusTwo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipmentsMinusTwoType::class, $equipmentsMinusTwo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_equipments_minus_two_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equipments_minus_two/edit.html.twig', [
            'equipments_minus_two' => $equipmentsMinusTwo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_equipments_minus_two_delete', methods: ['POST'])]
    public function delete(Request $request, EquipmentsMinusTwo $equipmentsMinusTwo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipmentsMinusTwo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($equipmentsMinusTwo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_equipments_minus_two_index', [], Response::HTTP_SEE_OTHER);
    }
}
