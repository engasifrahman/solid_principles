<?php

namespace Solid\OCP\GoodExample;

use Solid\OCP\GoodExample\Contracts\IPaymentMethod;

/**
 * Class StripePayment
 *
 * Implements IPaymentMethod for Stripe payments.
 */
class StripePayment implements IPaymentMethod
{
    /**
     * Process a payment via Stripe.
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
     * Get the name of the payment method.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'Stripe';
    }
}
