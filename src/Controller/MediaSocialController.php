<?php

namespace App\Controller;

use App\Entity\MediaSocial;
use App\Form\MediaSocialType;
use App\Repository\MediaSocialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('adminpanel/socialmedia')]
class MediaSocialController extends AbstractController
{
    #[Route('/', name: 'app_media_social_index', methods: ['GET'])]
    public function index(MediaSocialRepository $mediaSocialRepository): Response
    {
        return $this->render('media_social/index.html.twig', [
            'media_socials' => $mediaSocialRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_media_social_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $mediaSocial = new MediaSocial();
        $form = $this->createForm(MediaSocialType::class, $mediaSocial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($mediaSocial);
            $entityManager->flush();

            return $this->redirectToRoute('app_media_social_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('media_social/new.html.twig', [
            'media_social' => $mediaSocial,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_media_social_show', methods: ['GET'])]
    public function show(MediaSocial $mediaSocial): Response
    {
        return $this->render('media_social/show.html.twig', [
            'media_social' => $mediaSocial,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_media_social_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MediaSocial $mediaSocial, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MediaSocialType::class, $mediaSocial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_media_social_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('media_social/edit.html.twig', [
            'media_social' => $mediaSocial,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_media_social_delete', methods: ['POST'])]
    public function delete(Request $request, MediaSocial $mediaSocial, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mediaSocial->getId(), $request->request->get('_token'))) {
            $entityManager->remove($mediaSocial);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_media_social_index', [], Response::HTTP_SEE_OTHER);
    }
}
