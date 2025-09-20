<?php

namespace Solid\LSP\BadExample;

/**
 * Class PayPalPayment
 *
 * Extends PaymentMethod for PayPal payments. Does not support Buy Now, Pay Later (BNPL).
 */
class PayPalPayment extends PaymentMethod
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

        echo "💳 PayPal payment of $amount processed successfully.\n";
    }

    /**
     * Attempt to use Buy Now, Pay Later (BNPL) (not supported by PayPal).
     *
     * @param float $amount The payment amount
     * @param int $installments Number of installments
     * @throws \Exception
     * @return void
     */
    public function buyNowPayLater(float $amount, int $installments): void
    {
        throw new \Exception('PayPal does not support Buy Now, Pay Later!');
    }
}
