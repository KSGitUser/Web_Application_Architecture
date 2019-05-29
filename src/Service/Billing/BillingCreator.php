<?php

namespace Service\Billing;

use Service\Billing\IBilling;

abstract class BillingCreator
{
  abstract public function factoryMethod(): IBilling;

  public function billsPay($amount = 0): string
  {
    $wayPay = $this->factoryMethod();
    $result = "The transition complitted - {$wayPay->pay($amount)}";
    return $result;
  }
}
