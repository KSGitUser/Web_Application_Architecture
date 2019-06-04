<?php

namespace Service\Order;

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
  protected $basket;


  public function __construct(
    IDiscount $discount,
    IBilling $billing,
    ISecurity $security,
    ICommunication $communication,
    SessionInterface $session
  ) {
    $this->discount = $discount;
    $this->billing = $billing;
    $this->security = $security;
    $this->comminucation = $communication;
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
