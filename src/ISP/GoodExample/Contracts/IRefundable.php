<?php

namespace Solid\ISP\GoodExample\Contracts;

/**
 * Interface IRefundable
 *
 * Extends IPaymentMethod to support refunds.
 */
interface IRefundable extends IPaymentMethod
{
    /**
     * Process a refund.
     *
     * @param float $amount The refund amount
     * @return void
     */
    public function refund(float $amount): void;
}
