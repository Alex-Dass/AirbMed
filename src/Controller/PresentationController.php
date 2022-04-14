<?php

namespace App\Controller;

use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    #[Route('/presentation', name: 'app_presentation')]
    public function index(): Response
    {
        return $this->render('presentation/presidente.html.twig');
    }
    //-------------------------------------------------------------------------------
    #[Route('/presentation/{id}', name: 'page_presentation')]
    public function page_presentation(int $id, PresentationRepository $presentationRepository): Response
    {   
        $page = $presentationRepository->findBy(['id' => $id]);
        return $this->render('presentation/body.html.twig', [
            'page' => $page,
        ]);
    }
    //-------------------------------------------------------------------------------
    #[Route('/', name: 'navbar_presentation')]
    public function navbar_presentation(int $id, PresentationRepository $presentationRepository): Response
    {   
        $page = $presentationRepository->findBy(['id' => $id]);
        return $this->render('base.html.twig', [
            'page' => $page,
        ]);
    }
}