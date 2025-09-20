<?php
namespace Solid\ISP\GoodExample;

use Solid\ISP\GoodExample\Contracts\IPaymentMethod;
use Solid\ISP\GoodExample\Contracts\IRecurringPayment;
use Solid\ISP\GoodExample\Contracts\IRefundable;

class StripePayment implements IPaymentMethod, IRecurringPayment, IRefundable
{
    public function pay(float $amount): void
    {
        echo "Paid $amount via Stripe\n";
    }

    public function scheduleRecurring(float $amount, string $interval): void
    {
        echo "Stripe recurring payment: $amount every $interval\n";
    }

    public function refund(float $amount): void
    {
        echo "Stripe refunded $amount\n";
    }
}
