<?php

namespace App\Controller;

use App\Repository\PartenairesRepository;
use App\Repository\PresentationRepository;
use App\Repository\PrestationsRepository;
use App\Repository\SousPrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'creer_menu')]
    public function creer_menu(SousPrestationsRepository $sousPrestationsRepository ,PresentationRepository $presentationRepository, PartenairesRepository $partenairesRepository,  PrestationsRepository $prestationsRepository): Response
    {   
        $presentations = $presentationRepository->findAll();
        $partanires = $partenairesRepository->findAll();
        $prestations = $prestationsRepository->findAll();
        $sousPresta = $sousPrestationsRepository->findAll();
        return $this->render('menu/index.html.twig', [
            'presentations' => $presentations,
            'partanires' => $partanires,
            'prestations' => $prestations,
            'sousPresta' => $sousPresta,
            
        ]);
    }
}
