<?php
namespace Solid\ISP\GoodExample;

use Solid\ISP\GoodExample\Contracts\PaymentMethod;
use Solid\ISP\GoodExample\Contracts\Refundable;

class PayPalPayment implements PaymentMethod, Refundable
{
    public function pay(float $amount): void
    {
        echo "Paid $amount via PayPal\n";
    }

    public function refund(float $amount): void
    {
        echo "PayPal refunded $amount\n";
    }

    // No recurring method needed → ISP respected
}
