<?php

namespace App\Controller;

use App\Repository\PrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationController extends AbstractController
{
    #[Route('/prestation/{slug}', name: 'page_prestation')]
    public function page_prestation(string $slug, PrestationsRepository $prestationsRepository): Response
    {   
        $page = $prestationsRepository->findOneBy(['slug' => $slug]);
        return $this->render('prestation/index.html.twig', [
            'page' => $page,
        ]);
    }
}
