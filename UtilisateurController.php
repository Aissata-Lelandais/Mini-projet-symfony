<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/inscription", name="utilisateur")
     */
    public function inscription(Request $request, MailerService $mailer, LoggerInterface $logger, TranslatorInterface $translator,SerializerInterface $serializer): Response
    {
        $utilisateur = new Utilisateur();
        $this->addFlash('notice', 'Bienvenue!');
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $logger->info('Une simple ligne d\'information');


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateur = $form->getData();

            $mailer->sendEmail($utilisateur);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            $translated = $translator->trans('Symfony is great');

            return $this->redirectToRoute('utilisateur_success');
        }
        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
            'form' => $form->createView(),


        ]);
    }
};
