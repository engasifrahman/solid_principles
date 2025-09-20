<?php

namespace Solid\DIP\GoodExample;

use Solid\DIP\GoodExample\Contracts\IPaymentMethod;

/**
 * Class PayPalPayment
 *
 * Simulates payment processing using PayPal.
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
     * Process a payment using PayPal.
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
}
