<?php

namespace Solid\LSP\GoodExample;

use Solid\LSP\GoodExample\Contracts\IPaymentMethod;

class PaypalPayment implements IPaymentMethod
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

    // No BNPL method as PayPal not supports it, respecting LSP
}
