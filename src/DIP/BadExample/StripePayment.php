<?php
namespace Solid\DIP\BadExample;

class StripePayment
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
