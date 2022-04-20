<?php

namespace App\Controller;

use App\Repository\PartenairesRepository;
use App\Repository\PresentationRepository;
use App\Repository\PrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'creer_menu')]
    public function creer_menu( PresentationRepository $presentationRepository, PartenairesRepository $partenairesRepository,  PrestationsRepository $prestationsRepository): Response
    {   
        $presentations = $presentationRepository->findAll();
        $partanires = $partenairesRepository->findAll();
        $prestations = $prestationsRepository->findAll();

        return $this->render('menu/index.html.twig', [
            'presentations' => $presentations,
            'partanires' => $partanires,
            'prestations' => $prestations,

        ]);
    }
}
