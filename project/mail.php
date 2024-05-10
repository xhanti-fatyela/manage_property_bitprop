<?php

use Mailtrap\Config;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Mailtrap\EmailHeader\CategoryHeader;

require __DIR__ . '/vendor/autoload.php';

$apiKey = 'a18cc708fdd7dc407fbfd46c0728d198';
$mailtrap = new MailtrapClient(new Config($apiKey));

$email = (new Email())
    ->from(new Address('mailtrap@demomailtrap.com', 'Mailtrap Test'))
    ->to(new Address("xmanmrcool@gmail.com"))
    ->subject('Interest in Property')
    ->text('Hi, thank you for your interest in one of our properties you will be hearing from one of our agents soon')
;

$email->getHeaders()
    ->add(new CategoryHeader('Integration Test'))
;

$response = $mailtrap->sending()->emails()->send($email);

var_dump(ResponseHelper::toArray($response));
    
