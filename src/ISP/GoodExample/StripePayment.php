<?php
namespace Solid\ISP\GoodExample;

use Solid\ISP\GoodExample\Contracts\PaymentMethod;
use Solid\ISP\GoodExample\Contracts\RecurringPayment;
use Solid\ISP\GoodExample\Contracts\Refundable;

class StripePayment implements PaymentMethod, RecurringPayment, Refundable
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
