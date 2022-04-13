<?php

namespace App\Controller;

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
    #[Route('/presentation/presidente', name: 'presidente')]
    public function index2(): Response
    {
        return $this->render('presentation/presidente.html.twig',[
        'controller_name' => 'PresentationController']);
    }
    //-------------------------------------------------------------------------------
    #[Route('/presentation/assos', name: 'assos')]
    public function index3(): Response
    {
        $urlUnAuth = $this->render('presentation/assos.html.twig', [
            'controller_name' => 'PresentationController',
            ]);
            return  $urlUnAuth;

    }
    //-------------------------------------------------------------------------------
    #[Route('/presentation/metier', name: 'metier')]
    public function index4(): Response
    {
        $urlUnAuth = $this->render('presentation/metier.html.twig', [
            'controller_name' => 'PresentationController',
            ]);
            return  $urlUnAuth;

    }
    //-------------------------------------------------------------------------------
    #[Route('/presentation/histoire', name: 'histoire')]
    public function index5(): Response
    {
        $urlUnAuth = $this->render('presentation/histoire.html.twig', [
            'controller_name' => 'PresentationController',
            ]);
            return  $urlUnAuth;

    }
    //-------------------------------------------------------------------------------
    #[Route('/presentation/valeur', name: 'valeur')]
    public function index6(): Response
    {
        $urlUnAuth = $this->render('presentation/valeur.html.twig', [
            'controller_name' => 'PresentationController',
            ]);
            return  $urlUnAuth;

    }
    //-------------------------------------------------------------------------------
    #[Route('/presentation/equipe', name: 'equipe')]
    public function index7(): Response
    {
        $urlUnAuth = $this->render('presentation/equipe.html.twig', [
            'controller_name' => 'PresentationController',
            ]);
            return  $urlUnAuth;
    }
    //-------------------------------------------------------------------------------
}