<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Service\Billing\CardPayCreator;
use Service\Billing\BankTransferCreator;
use Service\Communication\SendMessage;
use Service\Communication\EmailMessageFactory;
use Service\Communication\SmsMessageFactory;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$card = new CardPayCreator;
echo $card->billsPay(100) . "<br>";

$bankTransfer = new BankTransferCreator;
echo $bankTransfer->billsPay(200);

echo "<br><br>";


$messageToUser = new SendMessage();

$messageToUser->createMessage(new EmailMessageFactory);

echo "<br>";

$messageToUser->createMessage(new SmsMessageFactory);

exit();


$request = Request::createFromGlobals();
$containerBuilder = new ContainerBuilder();

Framework\Registry::addContainer($containerBuilder);

$response = (new Kernel($containerBuilder))->handle($request);
$response->send();
