<?php
namespace Solid\ISP\GoodExample\Contracts;

interface IRecurringPayment
{
    public function scheduleRecurring(float $amount, string $interval): void;
}
