<?php

namespace App\Controller;

use App\Entity\WorkContact;
use App\Form\WorkContactType;
use App\Repository\WorkContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('adminpanel/workcontact')]
class WorkContactController extends AbstractController
{
    #[Route('/', name: 'app_work_contact_index', methods: ['GET'])]
    public function index(WorkContactRepository $workContactRepository): Response
    {
        return $this->render('work_contact/index.html.twig', [
            'work_contacts' => $workContactRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_work_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $workContact = new WorkContact();
        $form = $this->createForm(WorkContactType::class, $workContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($workContact);
            $entityManager->flush();

            return $this->redirectToRoute('app_work_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('work_contact/new.html.twig', [
            'work_contact' => $workContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_work_contact_show', methods: ['GET'])]
    public function show(WorkContact $workContact): Response
    {
        return $this->render('work_contact/show.html.twig', [
            'work_contact' => $workContact,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_work_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, WorkContact $workContact, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WorkContactType::class, $workContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_work_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('work_contact/edit.html.twig', [
            'work_contact' => $workContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_work_contact_delete', methods: ['POST'])]
    public function delete(Request $request, WorkContact $workContact, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workContact->getId(), $request->request->get('_token'))) {
            $entityManager->remove($workContact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_work_contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
