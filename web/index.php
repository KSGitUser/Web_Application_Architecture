<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Service\Billing\CardPayCreator;
use Service\Billing\BankTransferCreator;
use Service\Communication\SendMessage;
use Service\Communication\EmailMessageFactory;
use Service\Communication\SmsMessageFactory;
use Service\SocialNetwork\VkApi;
use VK\Client\VKApiClient;
use Service\Product\Product;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

/* $card = new CardPayCreator;
echo $card->billsPay(100) . "<br>";

$bankTransfer = new BankTransferCreator;
echo $bankTransfer->billsPay(200);

echo "<br><br>";


$messageToUser = new SendMessage();

$messageToUser->createMessage(new EmailMessageFactory);

echo "<br>";

$messageToUser->createMessage(new SmsMessageFactory); */


//применение паттерна Стратегия
/* $product = new Product();
$productsSortedByName = $product->getAll("Name");
var_dump($productsSortedByName);
$productsSortedByPrice = $product->getAll("Price");
var_dump($productsSortedByPrice);
exit(); */




$request = Request::createFromGlobals();
$containerBuilder = new ContainerBuilder();

Framework\Registry::addContainer($containerBuilder);


/*  var_dump($vkConnect);  */

/* $vk = new VKApiClient();
$response = $vk->users()
  ->get(
    $access_token,
    array(
      'user_ids' => array(1, 210700286),
      'fields' => array('city', 'photo'),
    )
  );  */




$response = (new Kernel($containerBuilder))->handle($request);
$response->send();
