<?php
namespace Solid\LSP\GoodExample\Contracts;

interface IBuyNowPayLater
{
    public function buyNowPayLater(float $amount, int $installments): void;
}
