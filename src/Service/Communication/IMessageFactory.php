<?php

namespace Service\Communication;

interface IMessageFactory
{
  public function makeConnection(): IConnection;
  public function sendMessage(): ICommunication;
}
