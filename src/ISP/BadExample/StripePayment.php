<?php
namespace Solid\ISP\BadExample;

class StripePayment implements IPaymentGateway
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
