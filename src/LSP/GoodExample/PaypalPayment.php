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
        echo "Paid $amount via PayPal\n";
    }

    // No BNPL method as PayPal not supports it, respecting LSP
}
