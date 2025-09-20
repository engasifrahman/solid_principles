<?php
namespace Solid\ISP\GoodExample;

use Solid\ISP\GoodExample\Contracts\IPaymentMethod;
use Solid\ISP\GoodExample\Contracts\IRefundable;

class PayPalPayment implements IPaymentMethod, IRefundable
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
