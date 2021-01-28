<?php
use Symfony\Component\Mime\Address;

$email = (new Email())
    // email address as a simple string
    ->from('aissata.lelandais@gmail.com')

    // email address as an object
    ->from(new Address('aissata.lelandais@gmail.com'))

    // defining the email address and name as an object
    // (email clients will display the name)
    ->from(new Address('aissata.lelandais@gmail.com', 'Aïssata'))

    // defining the email address and name as a string
    // (the format must match: 'Name <email@example.com>')
    ->from(Address::create('Aïssata Lelandais <aissata.lelandais@gmail.com>'))

    // ...
;
?>