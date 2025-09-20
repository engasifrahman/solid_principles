<?php

namespace Solid\LSP\GoodExample;

use Solid\LSP\GoodExample\Contracts\IBuyNowPayLater;

/**
 * Class StripePayment
 *
 * Implements IBuyNowPayLater for Stripe payments, including Buy Now, Pay Later (BNPL) support.
 */
class StripePayment implements IBuyNowPayLater
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
     * Process a Buy Now, Pay Later (BNPL) payment via Stripe.
     *
     * @param float $amount The payment amount
     * @param int $installments Number of installments
     * @return void
     */
    public function buyNowPayLater(float $amount, int $installments): void
    {
        echo "💳 Processing Stripe BNPL: $amount split into $installments installments...\n";

        // Simulate Stripe BNPL payment processing logic
        // This could involve API calls, etc.

        echo "💳 Stripe BNPL payment of $amount and $installments installments processed successfully.\n\n";
    }
}
