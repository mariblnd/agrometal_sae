<?php

namespace App\Controller;

use App\Entity\MapRegions;
use App\Form\MapRegionsType;
use App\Repository\MapRegionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adminpanel/map')]
class MapRegionsController extends AbstractController
{
    #[Route('/', name: 'app_map_regions_index', methods: ['GET'])]
    public function index(MapRegionsRepository $mapRegionsRepository): Response
    {
        return $this->render('map_regions/index.html.twig', [
            'map_regions' => $mapRegionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_map_regions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $mapRegion = new MapRegions();
        $form = $this->createForm(MapRegionsType::class, $mapRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($mapRegion);
            $entityManager->flush();

            return $this->redirectToRoute('app_map_regions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('map_regions/new.html.twig', [
            'map_region' => $mapRegion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_map_regions_show', methods: ['GET'])]
    public function show(MapRegions $mapRegion): Response
    {
        return $this->render('map_regions/show.html.twig', [
            'map_region' => $mapRegion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_map_regions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MapRegions $mapRegion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MapRegionsType::class, $mapRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_map_regions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('map_regions/edit.html.twig', [
            'map_region' => $mapRegion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_map_regions_delete', methods: ['POST'])]
    public function delete(Request $request, MapRegions $mapRegion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mapRegion->getId(), $request->request->get('_token'))) {
            $entityManager->remove($mapRegion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_map_regions_index', [], Response::HTTP_SEE_OTHER);
    }
}
