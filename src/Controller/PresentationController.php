<?php

namespace App\Controller;

use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    //-------------------------------------------------------------------------------
    #[Route('/presentation/{id}', name: 'page_presentation')]
    public function page_presentation(int $id, PresentationRepository $presentationRepository): Response
    {   
        $page = $presentationRepository->find($id);
        return $this->render('presentation/body.html.twig', [
            'page' => $page,
        ]);
    }
    //-------------------------------------------------------------------------------
}