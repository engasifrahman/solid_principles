<?php
namespace Solid\ISP\GoodExample;

use Solid\ISP\GoodExample\Contracts\IRecurringPayment;
use Solid\ISP\GoodExample\Contracts\IRefundable;

class StripePayment implements IRecurringPayment, IRefundable
{
    public function getName(): string
    {
        return "Stripe";
    }

    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via Stripe...\n";

        // Simulate Stripe payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe payment of $amount processed successfully.\n\n";
    }

    public function scheduleRecurring(float $amount, string $interval): void
    {
        echo "💳 Processing tripe recurring payment: $amount every $interval...\n";

        // Simulate Stripe payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe recurring payment of $amount every $interval processed successfully.\n\n";
    }

    public function refund(float $amount): void
    {
        echo "💳 Processing $amount refund via Stripe...\n";

        // Simulate Stripe payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe refund of $amount processed successfully.\n\n";
    }
}
