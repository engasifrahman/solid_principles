<?php

namespace Solid\DIP\GoodExample;

use Solid\DIP\GoodExample\Contracts\IPaymentMethod;

class PayPalPayment implements IPaymentMethod
{
    public function getName(): string
    {
        return "PayPal";
    }

    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.

        echo "💳 PayPal payment of $amount processed successfully.\n\n";
    }
}
