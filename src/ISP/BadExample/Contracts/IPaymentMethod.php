<?php

namespace Solid\ISP\BadExample\Contracts;

/**
 * Interface IPaymentMethod
 *
 * Contract for payment method implementations (bad ISP example).
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

    /**
     * Schedule a recurring payment.
     *
     * @param float $amount The payment amount
     * @param string $interval The recurrence interval
     * @return void
     */
    public function scheduleRecurring(float $amount, string $interval): void;

    /**
     * Refund a payment.
     *
     * @param float $amount The refund amount
     * @return void
     */
    public function refund(float $amount): void;
}
