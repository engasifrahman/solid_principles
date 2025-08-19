<?php
namespace Solid\OCP\GoodExample;

use Solid\OCP\GoodExample\Contracts\PaymentMethod;

class PaypalPayment implements PaymentMethod
{
    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.   

        echo "💳 PayPal payment of $amount processed successfully.\n";
    }

    public function getName(): string
    {
        return "PayPal";
    }
}
