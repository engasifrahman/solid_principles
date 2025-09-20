<?php

namespace Solid\DIP\GoodExample;

use Solid\DIP\GoodExample\Contracts\IPaymentMethod;

/**
 * Class StripePayment
 *
 * Simulates payment processing using Stripe.
 */
class StripePayment implements IPaymentMethod
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
}
