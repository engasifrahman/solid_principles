<?php

namespace Solid\LSP\BadExample;

class PayPalPayment extends PaymentMethod
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

        echo "💳 PayPal payment of $amount processed successfully.\n";
    }

    // ❌ Violation: PayPal cannot support BNPL
    public function buyNowPayLater(float $amount, int $installments): void
    {
        throw new \Exception("PayPal does not support Buy Now, Pay Later!");
    }
}
