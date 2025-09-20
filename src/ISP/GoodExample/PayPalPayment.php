<?php

namespace Solid\ISP\GoodExample;

use Solid\ISP\GoodExample\Contracts\IRefundable;

/**
 * Class PayPalPayment
 *
 * Implements the IRefundable interface for PayPal payments.
 */
class PayPalPayment implements IRefundable
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

    /**
     * Process a refund via PayPal.
     *
     * @param float $amount The refund amount
     * @return void
     */
    public function refund(float $amount): void
    {
        echo "💳 Processing $amount refund via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.

        echo "💳 PayPal refund of $amount processed successfully.\n\n";
    }

    // No recurring method needed → ISP respected
}
