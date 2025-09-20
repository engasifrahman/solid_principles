<?php
namespace Solid\ISP\GoodExample\Contracts;

interface IRefundable
{
    public function refund(float $amount): void;
}
