<?php
namespace Solid\ISP\GoodExample\Contracts;

interface Refundable
{
    public function refund(float $amount): void;
}
