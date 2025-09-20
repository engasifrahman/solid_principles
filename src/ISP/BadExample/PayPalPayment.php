<?php
namespace Solid\ISP\BadExample;

use Solid\ISP\BadExample\Contracts\IPaymentMethod;

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

    public function scheduleRecurring(float $amount, string $interval): void
    {
        // ❌ Violation: PayPal cannot support recurring payments
        throw new \Exception("PayPal does not support recurring payments!");
    }

    public function refund(float $amount): void
    {
        echo "💳 Processing $amount refund via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.

        echo "💳 PayPal refund of $amount processed successfully.\n\n";
    }
}
