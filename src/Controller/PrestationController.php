<?php

namespace App\Controller;

use App\Repository\PrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationController extends AbstractController
{
    #[Route('/prestation/{id}', name: 'page_prestation')]
    public function page_prestation(int $id, PrestationsRepository $prestationsRepository): Response
    {   
        $page = $prestationsRepository->find($id);
        return $this->render('prestation/index.html.twig', [
            'page' => $page,
        ]);
    }
}
