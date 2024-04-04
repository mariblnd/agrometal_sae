<?php

namespace App\Controller;

use App\Entity\ContactAgrometal;
use App\Form\ContactAgrometalType;
use App\Repository\ContactAgrometalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('adminpanel/contact')]
class ContactAgrometalController extends AbstractController
{
    #[Route('/', name: 'app_contact_agrometal_index', methods: ['GET'])]
    public function index(ContactAgrometalRepository $contactAgrometalRepository): Response
    {
        return $this->render('contact_agrometal/index.html.twig', [
            'contact_agrometals' => $contactAgrometalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contact_agrometal_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contactAgrometal = new ContactAgrometal();
        $form = $this->createForm(ContactAgrometalType::class, $contactAgrometal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contactAgrometal);
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_agrometal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_agrometal/new.html.twig', [
            'contact_agrometal' => $contactAgrometal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contact_agrometal_show', methods: ['GET'])]
    public function show(ContactAgrometal $contactAgrometal): Response
    {
        return $this->render('contact_agrometal/show.html.twig', [
            'contact_agrometal' => $contactAgrometal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contact_agrometal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContactAgrometal $contactAgrometal, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactAgrometalType::class, $contactAgrometal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_agrometal_show', ['id' => 2], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_agrometal/edit.html.twig', [
            'contact_agrometal' => $contactAgrometal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contact_agrometal_delete', methods: ['POST'])]
    public function delete(Request $request, ContactAgrometal $contactAgrometal, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactAgrometal->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contactAgrometal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contact_agrometal_index', [], Response::HTTP_SEE_OTHER);
    }
}
