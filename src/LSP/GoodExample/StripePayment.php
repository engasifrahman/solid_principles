<?php
namespace Solid\LSP\GoodExample;

use Solid\LSP\GoodExample\Contracts\IPaymentMethod;
use Solid\LSP\GoodExample\Contracts\IBuyNowPayLater;

class StripePayment implements IPaymentMethod, IBuyNowPayLater
{
    public function getName(): string
    {
        return "Stripe";
    }

    public function pay(float $amount): void
    {
        echo "Paid $amount via Stripe\n";
    }

    public function buyNowPayLater(float $amount, int $installments): void
    {
        echo "Stripe BNPL: $amount split into $installments installments\n";
    }
}
