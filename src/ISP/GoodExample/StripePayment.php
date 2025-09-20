<?php

namespace Solid\ISP\GoodExample;

use Solid\ISP\GoodExample\Contracts\IRecurringPayment;
use Solid\ISP\GoodExample\Contracts\IRefundable;

/**
 * Class StripePayment
 *
 * Implements IRecurringPayment and IRefundable interfaces for Stripe payments.
 */
class StripePayment implements IRecurringPayment, IRefundable
{
    /**
     * Get the name of the payment method.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'Stripe';
    }

    /**
     * Process a payment using Stripe.
     *
     * @param float $amount The payment amount
     * @return void
     */
    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via Stripe...\n";

        // Simulate Stripe payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe payment of $amount processed successfully.\n\n";
    }

    /**
     * Schedule a recurring payment using Stripe.
     *
     * @param float $amount The payment amount
     * @param string $interval The payment interval (e.g., 'monthly', 'yearly')
     * @return void
     */
    public function scheduleRecurring(float $amount, string $interval): void
    {
        echo "💳 Processing tripe recurring payment: $amount every $interval...\n";

        // Simulate Stripe payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe recurring payment of $amount every $interval processed successfully.\n\n";
    }

    /**
     * Process a refund using Stripe.
     *
     * @param float $amount The refund amount
     * @return void
     */
    public function refund(float $amount): void
    {
        echo "💳 Processing $amount refund via Stripe...\n";

        // Simulate Stripe payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe refund of $amount processed successfully.\n\n";
    }
}
