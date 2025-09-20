<?php
namespace Solid\ISP\GoodExample;

use Solid\ISP\GoodExample\Contracts\IRefundable;

class PayPalPayment implements IRefundable
{
    public function getName(): string
    {
        return "PayPal";
    }

    public function pay(float $amount): void
    {
        echo "💳 Processing $amount via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.

        echo "💳 PayPal payment of $amount processed successfully.\n\n";
    }

    public function refund(float $amount): void
    {
        echo "💳 Processing $amount refund via PayPal...\n";

        // Simulate PayPal payment processing logic
        // This could involve API calls, etc.

        echo "💳 PayPal refund of $amount processed successfully.\n\n";
    }

    // No recurring method needed → ISP respected
}
