<?php
namespace Solid\OCP\GoodExample\Contracts;

interface PaymentMethod
{
    public function pay(float $amount): void;
    public function getName(): string;
}
