<?php
namespace Solid\ISP\BadExample;

class PayPalPayment implements PaymentGateway
{
    public function pay(float $amount): void
    {
        echo "Paid $amount via PayPal\n";
    }

    public function scheduleRecurring(float $amount, string $interval): void
    {
        // ❌ Violation: PayPal cannot support recurring payments
        throw new \Exception("PayPal does not support recurring payments!");
    }

    public function refund(float $amount): void
    {
        echo "PayPal refunded $amount\n";
    }
}
