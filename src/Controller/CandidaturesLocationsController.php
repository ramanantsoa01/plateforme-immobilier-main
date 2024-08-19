<?php

namespace App\Controller;

use App\Entity\CandidaturesLocations;
use App\Form\CandidaturesLocationsType;
use App\Repository\CandidaturesLocationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/candidatures/locations')]
class CandidaturesLocationsController extends AbstractController
{
    #[Route('/', name: 'app_candidatures_locations_index', methods: ['GET'])]
    public function index(CandidaturesLocationsRepository $candidaturesLocationsRepository): Response
    {
        return $this->render('candidatures_locations/index.html.twig', [
            'candidatures_locations' => $candidaturesLocationsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_candidatures_locations_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $candidaturesLocation = new CandidaturesLocations();
        $form = $this->createForm(CandidaturesLocationsType::class, $candidaturesLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($candidaturesLocation);
            $entityManager->flush();

            return $this->redirectToRoute('app_candidatures_locations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidatures_locations/new.html.twig', [
            'candidatures_location' => $candidaturesLocation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidatures_locations_show', methods: ['GET'])]
    public function show(CandidaturesLocations $candidaturesLocation): Response
    {
        return $this->render('candidatures_locations/show.html.twig', [
            'candidatures_location' => $candidaturesLocation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_candidatures_locations_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CandidaturesLocations $candidaturesLocation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CandidaturesLocationsType::class, $candidaturesLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_candidatures_locations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidatures_locations/edit.html.twig', [
            'candidatures_location' => $candidaturesLocation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidatures_locations_delete', methods: ['POST'])]
    public function delete(Request $request, CandidaturesLocations $candidaturesLocation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidaturesLocation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($candidaturesLocation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_candidatures_locations_index', [], Response::HTTP_SEE_OTHER);
    }
}
