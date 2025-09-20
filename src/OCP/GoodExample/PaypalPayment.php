<?php

namespace Solid\OCP\GoodExample;

use Solid\OCP\GoodExample\Contracts\IPaymentMethod;

/**
 * Class PaypalPayment
 *
 * Implements IPaymentMethod for PayPal payments.
 */
class PaypalPayment implements IPaymentMethod
{
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

    /**
     * Get the name of the payment method.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'PayPal';
    }
}
