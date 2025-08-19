<?php
namespace Solid\LSP\GoodExample\Contracts;

interface BuyNowPayLater
{
    public function buyNowPayLater(float $amount, int $installments): void;
}
