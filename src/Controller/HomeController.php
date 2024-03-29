<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\MenuController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
            $urlUnAuth = $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            ]);
            return  $urlUnAuth;
    }

    public function footer(): Response
    {
        return $this->render('home/footer.html.twig', ['controller_name' => 'HomeController',]);
    }
}