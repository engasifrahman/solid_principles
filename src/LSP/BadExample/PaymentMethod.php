<?php

namespace Solid\LSP\BadExample;

abstract class PaymentMethod
{
    abstract public function getName(): string;

    public function pay(float $amount): void
    {
        echo "Paid $amount via generic payment method\n";
    }

    // Superclass defines Buy Now, Pay Later
    public function buyNowPayLater(float $amount, int $installments): void
    {
        echo "Payment of $amount in $installments installments\n";
    }
}
