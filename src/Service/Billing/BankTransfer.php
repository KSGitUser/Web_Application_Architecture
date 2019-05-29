<?php

declare (strict_types = 1);

namespace Service\Billing;

class BankTransfer implements IBilling
{
    /**
     * @inheritdoc
     */
    public function pay(float $totalPrice): string
    {
        return "{It was paid {$totalPrice} with BankTransfer}";
        // Проведение банковского транзакции (перевод с счёта на счёт)
    }
}
