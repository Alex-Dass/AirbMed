<?php

namespace App\Controller;

use App\Repository\PartenairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartenairesController extends AbstractController
{
    #[Route('/partenaires/sante', name: 'partenaire_sante')]
    public function partenaire_santé(PartenairesRepository $presentationRepository): Response
    {
        $partenaires = $presentationRepository->findAll();
        return $this->render('partenaires/index.html.twig', [
            'partenaires' => $partenaires,
        ]);
    }
    #[Route('/partenaires/usagers', name: 'partenaire_usagers')]
    public function partenaire_usagers(PartenairesRepository $presentationRepository): Response
    {
        $partenaires = $presentationRepository->findAll();
        return $this->render('partenaires/index.html.twig', [
            'partenaires' => $partenaires,
        ]);
    }
    #[Route('/partenaires/medicales', name: 'partenaire_medicales')]
    public function partenaire_medicales(PartenairesRepository $presentationRepository): Response
    {
        $partenaires = $presentationRepository->findAll();
        return $this->render('partenaires/index.html.twig', [
            'partenaires' => $partenaires,
        ]);
    }
}
