<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Rejoindre;
use App\Form\RejoindreType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class RejoindreController extends AbstractController
{
    #[Route('/rejoindre', name: 'app_rejoindre')]
    public function rejoindre(MailerInterface $mailer, Request $request, SluggerInterface $slugger): Response
    {
        $rejoindre = new rejoindre();
        $form = $this->createForm(RejoindreType::class, $rejoindre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $rejoindre = $form->getData();

            $cv = $form->get('cv')->getData();
            $motivation = $form->get('motivation')->getData();
            if ($cv && $motivation) {

                $originalFilenameCV = pathinfo($cv->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilenameMotivation = pathinfo($motivation->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilenameCV = $slugger->slug($originalFilenameCV);
                $safeFilenameMotiv = $slugger->slug($originalFilenameMotivation);

                $newFilenameCV = $safeFilenameCV.'-'.uniqid().'.'.$cv->guessExtension();
                $newFilenameMotiv = $safeFilenameMotiv.'-'.uniqid().'.'.$motivation->guessExtension();

                try {
                    $cv->move(
                        $this->getParameter('file_directory'),
                        $newFilenameCV
                        
                    );
                } catch (FileException $e) {
                    echo "Un probleme est survenu";
                }
                try {
                    $motivation->move(
                        $this->getParameter('file_directory'),
                        $newFilenameMotiv
                        
                    );
                } catch (FileException $e) {
                    echo "Un probleme est survenu";
                }
                
                $rejoindre->setCv($newFilenameCV);
                $rejoindre->setMotivation($newFilenameMotiv);
            }
            

            $message = (new Email())
            ->from($rejoindre->getEMail())
            ->to('adasilva@topics.fr')
            ->subject('Cv')
            ->text("Email de la part de ".$rejoindre->getNom().' '.$rejoindre->getPrenom().". Numéro ".$rejoindre->getTelephone()." Adresse mail ".$rejoindre->getEmail())
           // ->text($rejoindre->getPrenom())
           // $rejoindre->getTelephone()$rejoindre->getEmail()
            ->attachFromPath($this->getParameter('file_directory').'/'.$rejoindre->getCv())
            ->attachFromPath($this->getParameter('file_directory').'/'.$rejoindre->getMotivation());

            $mailer->send($message);
            $this->addFlash('success', 'Your message has been sent');
            return $this->redirectToRoute('app_rejoindre');
        }
        return $this->renderForm('rejoindre/index.html.twig', [
            'form' => $form,
        ]);
    }
}
