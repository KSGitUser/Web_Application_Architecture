<?php

namespace Service\Communication;

class SendMessage
{
  public function createMessage(IMessageFactory $messageFactory)
  {
    $message = new $messageFactory;
    $connection = $message->makeConnection();
    $messageText = $message->sendMessage();

    $connection->createConnection();
    $messageText->sendText();
  }
}
