<?php

namespace Service\Communication;

use Service\Communication\IMessageFactory;
use Service\Communication\CreateSmsConnection;
use Service\Communication\Sms;

class SmsMessageFactory implements IMessageFactory
{
  public function makeConnection(): IConnection
  {
    return new CreateSmsConnection;
  }
  public function sendMessage(): ICommunication
  {
    return new Sms;
  }
}
