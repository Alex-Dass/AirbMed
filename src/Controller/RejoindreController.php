<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Rejoindre;
use App\Form\RejoindreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;


class RejoindreController extends AbstractController
{
    #[Route('/rejoindre', name: 'app_rejoindre')]
    public function rejoindre(MailerInterface $mailer, Request $request): Response
    {
        $rejoindre = new rejoindre();
        $form = $this->createForm(RejoindreType::class, $rejoindre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $rejoindre = $form->getData();

            $message = (new Email())
            ->from($rejoindre->getMail())
            ->to('adasilva@topics.fr')
            ->subject($rejoindre->getObjet())
            ->text($rejoindre->getMessage());

            $mailer->send($message);
            $this->addFlash('success', 'Your message has been sent');
            return $this->redirectToRoute('app_rejoindre');
        }
        return $this->renderForm('rejoindre/index.html.twig', [
            'form' => $form,
        ]);
    }
}
