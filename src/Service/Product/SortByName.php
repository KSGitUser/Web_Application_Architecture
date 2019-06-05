<?php

namespace Service\Product;

use Service\Product\ISortProduct;

class SortByName implements ISortProduct
{
  
 
  public function sort($productList)
  {
    // реализация сортировки по имени
    usort($productList, function($a,$b) {return strcmp($a->name, $b->name);});  
    return $productList;
  }
  
}

