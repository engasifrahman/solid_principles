<?php
namespace Solid\ISP\GoodExample\Contracts;

interface RecurringPayment
{
    public function scheduleRecurring(float $amount, string $interval): void;
}
