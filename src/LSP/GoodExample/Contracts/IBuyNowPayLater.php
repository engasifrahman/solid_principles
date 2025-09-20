<?php

namespace Solid\LSP\GoodExample\Contracts;

/**
 * Interface IBuyNowPayLater
 *
 * Extends IPaymentMethod to support Buy Now, Pay Later (BNPL) payments.
 */
interface IBuyNowPayLater extends IPaymentMethod
{
    /**
     * Process a Buy Now, Pay Later (BNPL) payment.
     *
     * @param float $amount The payment amount
     * @param int $installments Number of installments
     * @return void
     */
    public function buyNowPayLater(float $amount, int $installments): void;
}
