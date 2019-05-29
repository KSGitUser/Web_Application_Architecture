<?php

namespace Service\Billing;

use Service\Billing\BillingCreator;
use Service\Billing\Card;

class CardPayCreator extends BillingCreator
{
  public function factoryMethod(): IBilling
  {
    return new Card;
  }
}


//В том месте где нужно создать класс пишем:
//$card = new CardPayCreator;
//echo $card->billsPay(100) . "<br>";
