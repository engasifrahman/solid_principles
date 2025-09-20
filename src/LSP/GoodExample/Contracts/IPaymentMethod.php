<?php
namespace Solid\LSP\GoodExample\Contracts;

interface IPaymentMethod
{
    public function pay(float $amount): void;
    public function getName(): string;
}
