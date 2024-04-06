<?php

namespace App\Controller;

use App\Entity\EquipmentsMinusOne;
use App\Form\EquipmentsMinusOneType;
use App\Repository\EquipmentsMinusOneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('adminpanel/equipments1')]
class EquipmentsMinusOneController extends AbstractController
{
    #[Route('/', name: 'app_equipments_minus_one_index', methods: ['GET'])]
    public function index(EquipmentsMinusOneRepository $equipmentsMinusOneRepository): Response
    {
        return $this->render('equipments_minus_one/index.html.twig', [
            'equipments_minus_ones' => $equipmentsMinusOneRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_equipments_minus_one_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $equipmentsMinusOne = new EquipmentsMinusOne();
        $form = $this->createForm(EquipmentsMinusOneType::class, $equipmentsMinusOne);
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

            $equipmentsMinusOne->setImage($newFilename);
            }
            
            $entityManager->persist($equipmentsMinusOne);
            $entityManager->flush();

            return $this->redirectToRoute('app_equipments_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->render('equipments_minus_one/new.html.twig', [
            'equipments_minus_one' => $equipmentsMinusOne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_equipments_minus_one_show', methods: ['GET'])]
    public function show(EquipmentsMinusOne $equipmentsMinusOne): Response
    {
        return $this->render('equipments_minus_one/show.html.twig', [
            'equipments_minus_one' => $equipmentsMinusOne,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_equipments_minus_one_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EquipmentsMinusOne $equipmentsMinusOne, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipmentsMinusOneType::class, $equipmentsMinusOne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
    
                $equipmentsMinusOne->setImage($newFilename);
                }
                
                $entityManager->flush();
    
                return $this->redirectToRoute('app_equipments_index', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->render('equipments_minus_one/edit.html.twig', [
            'equipments_minus_one' => $equipmentsMinusOne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_equipments_minus_one_delete', methods: ['POST'])]
    public function delete(Request $request, EquipmentsMinusOne $equipmentsMinusOne, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipmentsMinusOne->getId(), $request->request->get('_token'))) {
            $entityManager->remove($equipmentsMinusOne);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_equipments_minus_one_index', [], Response::HTTP_SEE_OTHER);
    }
}
