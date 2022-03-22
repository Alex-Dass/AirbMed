<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\TestEditorType;


class TestEditorController extends AbstractController
{
    #[Route('/test/editor', name: 'app_test_editor')]
    public function index(): Response
    {
        $form = $this->createForm(TestEditorType::class);

        return $this->render('test_editor/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
