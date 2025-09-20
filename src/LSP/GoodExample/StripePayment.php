<?php

namespace Solid\LSP\GoodExample;

use Solid\LSP\GoodExample\Contracts\IBuyNowPayLater;

class StripePayment implements IBuyNowPayLater
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

    public function buyNowPayLater(float $amount, int $installments): void
    {
        echo "💳 Processing Stripe BNPL: $amount split into $installments installments...\n";

        // Simulate Stripe BNPL payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe BNPL payment of $amount and $installments installments processed successfully.\n\n";
    }
}
