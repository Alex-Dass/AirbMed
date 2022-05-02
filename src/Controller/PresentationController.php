<?php

namespace App\Controller;

use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    //-------------------------------------------------------------------------------
    #[Route('/presentation/{slug}', name: 'page_presentation')]
    public function page_presentation(string $slug, PresentationRepository $presentationRepository): Response
    {   
        $page = $presentationRepository->findOneBy(['slug' => $slug]);
        return $this->render('presentation/body.html.twig', [
            'page' => $page,
        ]);
    }
    //-------------------------------------------------------------------------------
}