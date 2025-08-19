<?php
namespace Solid\LSP\BadExample;

class StripePayment extends PaymentMethod
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
