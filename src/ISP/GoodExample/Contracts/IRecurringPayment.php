<?php

namespace Solid\ISP\GoodExample\Contracts;

/**
 * Interface IRecurringPayment
 *
 * Extends IPaymentMethod to support recurring payments.
 */
interface IRecurringPayment extends IPaymentMethod
{
    /**
     * Schedule a recurring payment.
     *
     * @param float $amount The payment amount
     * @param string $interval The payment interval (e.g., 'monthly', 'yearly')
     * @return void
     */
    public function scheduleRecurring(float $amount, string $interval): void;
}
