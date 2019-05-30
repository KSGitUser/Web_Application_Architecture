<?php

namespace Service\Communication;

use Service\Communication\IMessageFactory;
use Service\Communication\CreateEmailConnection;
use Service\Communication\Email;

class EmailMessageFactory implements IMessageFactory
{
  public function makeConnection(): IConnection
  {
    return new CreateEmailConnection();
  }
  public function sendMessage(): ICommunication
  {
    return new Email();
  }
}
