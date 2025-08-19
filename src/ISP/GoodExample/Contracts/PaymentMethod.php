<?php
namespace Solid\ISP\GoodExample\Contracts;

interface PaymentMethod
{
    public function pay(float $amount): void;
}
