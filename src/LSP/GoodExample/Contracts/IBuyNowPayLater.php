<?php

namespace Solid\LSP\GoodExample\Contracts;

interface IBuyNowPayLater extends IPaymentMethod
{
    public function buyNowPayLater(float $amount, int $installments): void;
}
