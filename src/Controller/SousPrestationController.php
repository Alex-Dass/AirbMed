<?php

namespace App\Controller;

use App\Repository\SousPrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SousPrestationController extends AbstractController
{
    #[Route('/sous_prestation/{id}', name: 'app_sous_prestation')]
    public function index(SousPrestationsRepository $sousPrestations, int $id): Response
    {
        $sousPresta = $sousPrestations->findOneBy(["id" => $id]);
        return $this->render('sous_prestation/index.html.twig', [
            'sousPresta' => $sousPresta,
        ]);
    }
}
