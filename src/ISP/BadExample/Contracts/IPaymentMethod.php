<?php
namespace Solid\ISP\BadExample\Contracts;

interface IPaymentMethod
{
    public function getName(): string;

    public function pay(float $amount): void;

    // Not all gateways support recurring payments
    public function scheduleRecurring(float $amount, string $interval): void;

    // Not all gateways support refunds
    public function refund(float $amount): void;
}
