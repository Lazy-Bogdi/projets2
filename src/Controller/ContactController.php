<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    private $security;
    private $em;    
    
    public function __construct(EntityManagerInterface $em,Security $security)
    {
        $this->em = $em;
        $this->security = $security;
    }
    
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $allData = $form->getData();
            // $email = $form->get('email')->getData();
            // $content = $form->get('content')->getData();
            // $subject = $form->get('subject')->getData();
            $email = (new Email())
                ->from($allData['email'])
                ->to('admin@amin.com')
                ->subject($allData['subject'])
                ->text($allData['content']);
            $mailer->send($email);

            return $this->redirectToRoute('app_contact_success', [], Response::HTTP_SEE_OTHER);
        }

         
        return $this->render('contact/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/contact/succes', name: 'app_contact_success')]
    public function success(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $allData = $form->getData();
            // $email = $form->get('email')->getData();
            // $content = $form->get('content')->getData();
            // $subject = $form->get('subject')->getData();
            $email = (new Email())
                ->from($allData['email'])
                ->to('admin@amin.com')
                ->subject($allData['subject'])
                ->text($allData['content']);
            $mailer->send($email);
        }
        return $this->render('contact/success.html.twig', [
            'form' => $form,
        ]);
    }
}
