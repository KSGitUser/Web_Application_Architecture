<?php

namespace Service\Communication;

use Service\Communication\IConnection;

class CreateSmsConnection implements IConnection
{
  public function createConnection(): void
  {
    echo "Connection to SMS Server was done -> ";
  }
}
