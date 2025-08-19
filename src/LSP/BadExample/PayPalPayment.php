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
        echo "Paid $amount via PayPal\n";
    }

    // ❌ Violation: PayPal cannot support BNPL
    public function buyNowPayLater(float $amount, int $installments): void
    {
        throw new \Exception("PayPal does not support Buy Now, Pay Later!");
    }
}
