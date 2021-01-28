<?php

namespace App\Service;

use App\Entity\Utilisateur;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private $mailer;

    /**
     * MailerService constructor
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(Utilisateur $user)
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to($user->getMail())
            ->subject('Your ew account!')
            ->text('Sendingemails is fun again!')
            ->html('<p>Bonjour ' . $user->getNom() . 'See Twig integration for better HTML integration!</p>');
        $this->mailer->send($email);
    }
}
