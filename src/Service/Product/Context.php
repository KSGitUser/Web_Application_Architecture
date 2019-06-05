<?php

namespace Service\Product;

class Context
{
  private $sortStrategy;

  public function __construct(ISortProduct $sortStrategy)
  {
    $this->sortStrategy = $sortStrategy;
  }

  public function setStrategy(ISortProduct $sortStrategy)
  {
    $this->sortStrategy = $sortStrategy;
  }

  public function doSort($data)
  {
    $result = $this->sortStrategy->sort($data);
    return $result;
  }
}