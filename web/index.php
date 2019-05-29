<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Service\Billing\CardPayCreator;
use Service\Billing\BankTransferCreator;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

/* $card = new CardPayCreator;
echo $card->billsPay(100) . "<br>";

$bankTransfer = new BankTransferCreator;
echo $bankTransfer->billsPay(200);
exit(); */



$request = Request::createFromGlobals();
$containerBuilder = new ContainerBuilder();

Framework\Registry::addContainer($containerBuilder);

$response = (new Kernel($containerBuilder))->handle($request);
$response->send();
