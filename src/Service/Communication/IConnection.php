<?php

namespace Service\Communication;

interface IConnection
{
  public function createConnection(): void;
}
