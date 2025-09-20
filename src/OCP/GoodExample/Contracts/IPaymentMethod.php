<?php

namespace Solid\OCP\GoodExample\Contracts;

/**
 * Interface IPaymentMethod
 *
 * Represents a payment method contract for processing payments.
 */
interface IPaymentMethod
{
    /**
     * Process a payment.
     *
     * @param float $amount The payment amount
     * @return void
     */
    public function pay(float $amount): void;

    /**
     * Get the name of the payment method.
     *
     * @return string
     */
    public function getName(): string;
}
