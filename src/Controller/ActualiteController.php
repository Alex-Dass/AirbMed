<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use App\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index2(NewsRepository $newsRepository, int $id): Response
    {   
        $new = $newsRepository->findBy(['id' => $id]);
        return $this->render('actualite/body.html.twig', [
            'new' => $new,
        ]);
    }
}
