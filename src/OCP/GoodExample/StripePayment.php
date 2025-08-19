<?php
namespace Solid\OCP\GoodExample;

use Solid\OCP\GoodExample\Contracts\PaymentMethod;

class StripePayment implements PaymentMethod
{
    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via Stripe...\n";

        // Simulate Stripe payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe payment of $amount processed successfully.\n";
    }

    public function getName(): string
    {
        return "Stripe";
    }
}
