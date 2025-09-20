<?php
namespace Solid\ISP\GoodExample\Contracts;

interface IPaymentMethod
{
    public function pay(float $amount): void;
}
