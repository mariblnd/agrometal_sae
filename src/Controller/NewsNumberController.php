<?php

namespace App\Controller;

use App\Entity\NewsNumber;
use App\Form\NewsNumberType;
use App\Repository\NewsNumberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('adminpanel/newsnumber')]
class NewsNumberController extends AbstractController
{
    #[Route('/', name: 'app_news_number_index', methods: ['GET'])]
    public function index(NewsNumberRepository $newsNumberRepository): Response
    {
        return $this->render('news_number/index.html.twig', [
            'news_numbers' => $newsNumberRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_news_number_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $newsNumber = new NewsNumber();
        $form = $this->createForm(NewsNumberType::class, $newsNumber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($newsNumber);
            $entityManager->flush();

            return $this->redirectToRoute('app_news_number_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('news_number/new.html.twig', [
            'news_number' => $newsNumber,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_news_number_show', methods: ['GET'])]
    public function show(NewsNumber $newsNumber): Response
    {
        return $this->render('news_number/show.html.twig', [
            'news_number' => $newsNumber,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_news_number_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NewsNumber $newsNumber, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NewsNumberType::class, $newsNumber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_news_number_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('news_number/edit.html.twig', [
            'news_number' => $newsNumber,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_news_number_delete', methods: ['POST'])]
    public function delete(Request $request, NewsNumber $newsNumber, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newsNumber->getId(), $request->request->get('_token'))) {
            $entityManager->remove($newsNumber);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_news_number_index', [], Response::HTTP_SEE_OTHER);
    }
}
