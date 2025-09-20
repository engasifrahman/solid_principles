<?php
namespace Solid\ISP\GoodExample\Contracts;

interface IRecurringPayment extends IPaymentMethod
{
    public function scheduleRecurring(float $amount, string $interval): void;
}
