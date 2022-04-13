<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    #[Route('/actualite', name: 'liste_actu')]
    public function liste_actu(NewsRepository $newsRepository): Response
    {
        $news = $newsRepository->findAll();
        return $this->render('actualite/index.html.twig', [
            'news' => $news,
        ]);
    }
    #[Route('/actualite/{id}', name: 'single_actu')]
    public function index2(int $id, NewsRepository $newsRepository): Response
    {   
        $new = $newsRepository->find($id);
        return $this->render('actualite/body.html.twig', [
            'new' => $new,
        ]);
    }
}
