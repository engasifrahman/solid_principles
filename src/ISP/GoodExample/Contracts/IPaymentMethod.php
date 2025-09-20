<?php

namespace Solid\ISP\GoodExample\Contracts;

/**
 * Interface IPaymentMethod
 *
 * Represents a payment method contract for processing payments.
 */
interface IPaymentMethod
{
    /**
     * Get the name of the payment method.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Process a payment.
     *
     * @param float $amount The payment amount
     * @return void
     */
    public function pay(float $amount): void;
}
