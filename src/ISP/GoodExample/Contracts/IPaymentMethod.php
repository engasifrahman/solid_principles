<?php

namespace Solid\ISP\GoodExample\Contracts;

interface IPaymentMethod
{
    public function getName(): string;
    public function pay(float $amount): void;
}
