<?php

namespace Solid\DIP\GoodExample;

use Solid\DIP\GoodExample\Contracts\IPaymentMethod;

class StripePayment implements IPaymentMethod
{
    public function getName(): string
    {
        return "Stripe";
    }

    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via Stripe...\n";

        // Simulate Stripe payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe payment of $amount processed successfully.\n\n";
    }
}
