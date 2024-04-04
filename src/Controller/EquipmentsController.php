<?php

namespace App\Controller;

use App\Entity\Equipments;
use App\Form\EquipmentsType;
use App\Repository\EquipmentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('adminpanel/equipments')]
class EquipmentsController extends AbstractController
{
    #[Route('/', name: 'app_equipments_index', methods: ['GET'])]
    public function index(EquipmentsRepository $equipmentsRepository): Response
    {
        return $this->render('equipments/index.html.twig', [
            'equipments' => $equipmentsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_equipments_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $equipment = new Equipments();
        $form = $this->createForm(EquipmentsType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = $originalFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
            try {
            $imageFile->move(
            $this->getParameter('images_directory_equipments'),
            $newFilename
            );
            } catch (FileException $e) {
            }

            $equipment->setImage($newFilename);
            }
            
            $entityManager->persist($equipment);
            $entityManager->flush();

            return $this->redirectToRoute('app_equipments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equipments/new.html.twig', [
            'equipment' => $equipment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_equipments_show', methods: ['GET'])]
    public function show(Equipments $equipment): Response
    {
        return $this->render('equipments/show.html.twig', [
            'equipment' => $equipment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_equipments_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Equipments $equipment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipmentsType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_equipments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equipments/edit.html.twig', [
            'equipment' => $equipment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_equipments_delete', methods: ['POST'])]
    public function delete(Request $request, Equipments $equipment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipment->getId(), $request->request->get('_token'))) {
            $entityManager->remove($equipment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_equipments_index', [], Response::HTTP_SEE_OTHER);
    }
}
