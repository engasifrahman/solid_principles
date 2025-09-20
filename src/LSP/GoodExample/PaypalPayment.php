<?php

namespace Solid\LSP\GoodExample;

use Solid\LSP\GoodExample\Contracts\IPaymentMethod;

/**
 * Class PaypalPayment
 *
 * Implements IPaymentMethod for PayPal payments. Does not support Buy Now, Pay Later (BNPL).
 */
class PaypalPayment implements IPaymentMethod
{
    /**
     * Get the name of the payment method.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'PayPal';
    }

    /**
     * Process a payment via PayPal.
     *
     * @param float $amount The payment amount
     * @return void
     */
    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.

        echo "💳 PayPal payment of $amount processed successfully.\n\n";
    }

    // No BNPL method as PayPal not supports it, respecting LSP
}
