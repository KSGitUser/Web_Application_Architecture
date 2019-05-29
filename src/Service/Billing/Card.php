<?php

declare (strict_types = 1);

namespace Service\Billing;

class Card implements IBilling
{
    /**
     * @inheritdoc
     */
    public function pay(float $totalPrice): string
    {
        return "{It was paid {$totalPrice} with card}";
        // Оплата кредитной или дебетовой картой
    }
}
