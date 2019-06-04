<?php

namespace Service\Order;

use Service\Order\Basket;

/**
 * Проведение всех этапов заказа
 *
 * @param IDiscount $discount,
 * @param IBilling $billing,
 * @param ISecurity $security,
 * @param ICommunication $communication
 * @return void
 */
class checkoutProcess
{
  protected $discount;
  protected $billing;
  protected $security;
  protected $communication;
  protected $basket;
  protected $session;


  public function __construct(
    $discount,
    $billing,
    $security,
    $communication,
    $session
  ) {
    $this->discount = $discount;
    $this->billing = $billing;
    $this->security = $security;
    $this->communication = $communication;
    $this->session = $session;
    $this->basket = new Basket($this->session);
  }

  public function checkoutProcess()
  {
    $totalPrice = 0;
    foreach ($this->basket->getProductsInfo() as $product) {
      $totalPrice += $product->getPrice();
    }

    $this->discount = $this->discount->getDiscount();
    $totalPrice = $totalPrice - $totalPrice / 100 * $this->discount;

    $this->billing->pay($totalPrice);

    $user = $this->security->getUser();
    $this->communication->process($user, 'checkout_template');
  }
}
