<?php

namespace Service\Order;

use Service\Billing\Card;
use Service\Communication\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class CheckoutFacade
{

  protected $billing;
  protected $discount;
  protected $communication;
  protected $security;
  protected $process;
  protected $session;

  public function __construct($session)
  {
    $this->billing = new Card();
    $this->discount = new NullObject();
    $this->communication = new Email();
    $this->session = $session;
    $this->security = new Security($this->session);
    $this->process = new CheckoutProcess(
      $this->discount,
      $this->billing,
      $this->security,
      $this->communication,
      $this->session
    );
  }

  public function checkout()
  {
    $this->process->checkoutProcess();
  }
}
