<?php

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

$email = new Email();
// ...
try {
    $mailer->send($email);
} catch (TransportExceptionInterface $e) {
    // some error prevented the email sending; display an
    // error message or try to resend the message
}
