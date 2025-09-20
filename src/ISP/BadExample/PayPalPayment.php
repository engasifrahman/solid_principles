<?php

namespace Solid\ISP\BadExample;

use Solid\ISP\BadExample\Contracts\IPaymentMethod;

/**
 * Class PayPalPayment
 *
 * Implements the IPaymentMethod interface for PayPal payments.
 *
 * @package Solid\ISP\BadExample
 */
class PayPalPayment implements IPaymentMethod
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
     * @param float $amount
     * @return void
     */
    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.

        echo "💳 PayPal payment of $amount processed successfully.\n\n";
    }

    /**
     * Attempt to schedule a recurring payment (not supported by PayPal).
     *
     * @param float $amount
     * @param string $interval
     * @throws \Exception
     * @return void
     */
    public function scheduleRecurring(float $amount, string $interval): void
    {
        // ❌ Violation: PayPal cannot support recurring payments
        throw new \Exception('PayPal does not support recurring payments!');
    }

    /**
     * Process a refund via PayPal.
     *
     * @param float $amount
     * @return void
     */
    public function refund(float $amount): void
    {
        echo "💳 Processing $amount refund via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.

        echo "💳 PayPal refund of $amount processed successfully.\n\n";
    }
}
