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
    #[Route('/actualite/{slug}/', name: 'single_actu')]
    public function index2(NewsRepository $newsRepository, string $slug): Response
    {   
        $new = $newsRepository->findBy(['slug' => $slug]);
        return $this->render('actualite/body.html.twig', [
            'new' => $new,
        ]);
    }
    #[Route('/archives', name: 'archives')]
    public function archives(NewsRepository $newsRepository): Response
    {   
        $archive = $newsRepository->findAll();
        return $this->render('actualite/archives.html.twig', [
            'archive' => $archive,
        ]);
    }
    public function recentNews(NewsRepository $newsRepository){
        
        $news = $newsRepository->recentNews(3);

        return $this->render(
            'news/recent_news.html.twig',
            ['news' => $news]
        );
    }
    public function allNews(NewsRepository $newsRepository){
        
        $news = $newsRepository->allNews();

        return $this->render(
            'news/all_news.html.twig',
            ['news' => $news]
        );
    }
}
