<?php

namespace Service\Communication;

use Service\Communication\IConnection;

class CreateEmailConnection implements IConnection
{
  public function createConnection(): void
  {
    echo "Connection to Email Server was done -> ";
  }
}
