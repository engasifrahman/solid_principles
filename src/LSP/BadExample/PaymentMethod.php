<?php

namespace Solid\LSP\BadExample;

/**
 * Abstract Class PaymentMethod
 *
 * Represents a generic payment method with optional buy now, pay later functionality.
 */
abstract class PaymentMethod
{
    /**
     * Get the name of the payment method.
     *
     * @return string
     */
    abstract public function getName(): string;

    /**
     * Process a payment.
     *
     * @param float $amount The payment amount
     * @return void
     */
    public function pay(float $amount): void
    {
        echo "Paid $amount via generic payment method\n";
    }

    /**
     * Buy now, pay later functionality.
     *
     * @param float $amount The payment amount
     * @param int $installments Number of installments
     * @return void
     */
    public function buyNowPayLater(float $amount, int $installments): void
    {
        echo "Payment of $amount in $installments installments\n";
    }
}
