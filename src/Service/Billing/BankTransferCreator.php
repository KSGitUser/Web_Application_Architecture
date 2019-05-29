<?php

namespace Service\Billing;

use Service\Billing\BillingCreator;
use Service\Billing\BankTransfer;

class BankTransferCreator extends BillingCreator
{
  public function factoryMethod(): IBilling
  {
    return new BankTransfer;
  }
}



//В том месте где нужно создать класс пишем:
//$bankTransfer = new BankTransferCreator;
//echo $bankTransfer->billsPay(200);
