<?php
namespace Solid\LSP\GoodExample\Contracts;

interface PaymentMethod
{
    public function pay(float $amount): void;
    public function getName(): string;
}
