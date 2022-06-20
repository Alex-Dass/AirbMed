<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContatcType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FileUploader;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MailerInterface $mailer, Request $request, SluggerInterface $slugger): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContatcType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $File = $form->get('document')->getData();
            if ($File) {
                $originalFilename = pathinfo($File->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$File->guessExtension();

                try {
                    $File->move(
                        $this->getParameter('file_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    echo "Un probleme est survenu";
                }
                $contact->setDocument($newFilename);
                
            }
            $message = (new Email())
            ->from($contact->getMail())
            ->to('adasilva@topics.fr')
            ->subject($contact->getObjet())
            ->text($contact->getMessage())
            ->attachFromPath($this->getParameter('file_directory').'/'.$contact->getDocument());

            $mailer->send($message);
            $this->addFlash('success', 'Your message has been sent');
            return $this->redirectToRoute('app_informations');
        }
        return $this->renderForm('contact/index.html.twig', [
            'form' => $form,
        ]);
    }
}
