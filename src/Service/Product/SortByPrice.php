<?php

namespace Service\Product;

use Service\Product\ISortProduct;

class SortByPrice implements ISortProduct
{
  public function sort($productList)
  {
    // реализация сортировки по цене
    usort($productList, function($a,$b) {return $a->price <=> $b->price;}); 
    return $productList;
  }
  
}

