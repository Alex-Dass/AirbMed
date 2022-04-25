<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContatcType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MailerInterface $mailer, Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContatcType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $contact = $form->getData();

            $message = (new Email())
            ->from($contact->getMail())
            ->to('adasilva@topics.fr')
            ->subject($contact->getObjet())
            ->text($contact->getMessage());

            $mailer->send($message);
            $this->addFlash('success', 'Your message has been sent');
            return $this->redirectToRoute('app_informations');
        }
        return $this->renderForm('contact/index.html.twig', [
            'form' => $form,
        ]);
    }
}
