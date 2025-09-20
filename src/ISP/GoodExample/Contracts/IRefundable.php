<?php

namespace Solid\ISP\GoodExample\Contracts;

interface IRefundable extends IPaymentMethod
{
    public function refund(float $amount): void;
}
