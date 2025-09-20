<?php

namespace Solid\OCP\BadExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;

class PaymentProcessor
{
    private Logger $logger;
    private EmailNotifier $notifier;
    private PaymentRepository $repository;

    public function __construct(PaymentRepository $repository, Logger $logger, EmailNotifier $notifier)
    {
        $this->repository = $repository;
        $this->logger = $logger;
        $this->notifier = $notifier;
    }

    public function pay(string $method, float $amount): void
    {
        if ($method === 'stripe') {
            echo "💳 Processing $amount via Stripe...\n";

            // Simulate Stripe payment processing Logic
            // This could involve API calls, etc.

            echo "💳 Stripe payment of $amount processed successfully.\n\n";
        } elseif ($method === 'paypal') {
            echo "💳 Processing $amount via PayPal...\n";

            // Simulate PayPal payment processing logic
            // This could involve API calls, etc.

            echo "💳 PayPal payment of $amount processed successfully.\n\n";
        } else {
            throw new \Exception("Unsupported payment method: $method");
        }

        // Save to DB
        $this->repository->savePayment($method, $amount);

        // Logging
        $this->logger->log("[BAD][OCP] Payment: {$method}, Amount: $amount");

        // Email
        $this->notifier->send("customer@example.com", "Payment of $amount via {$method} completed.");
    }
}
