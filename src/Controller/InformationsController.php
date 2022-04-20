<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class InformationsController extends AbstractController
{
    #[Route('/informations', name: 'app_informations')]
    public function informations(): Response
    {
        return $this->render('informations/index.html.twig', [
            'controller_name' => 'InformationsController',
        ]);
    }
    #[Route('/informations/contacter', name: 'app_contacter')]
    public function contacter(Request $request): Response
    {
       
        return $this->render('informations/contacter.html.twig', [
        ]);
    }
    #[Route('/informations/rejoindre', name: 'app_rejoindre')]
    public function rejoindre(): Response
    {
        return $this->render('informations/rejoindre.html.twig', [
            'controller_name' => 'InformationsController',
        ]);
    }
}
