<?php

namespace Solid\DIP\GoodExample\Contracts;

/**
 * Interface IPaymentMethod
 *
 * Contract for payment method implementations.
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
