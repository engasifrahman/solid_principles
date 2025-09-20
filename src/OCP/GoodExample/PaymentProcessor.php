<?php

namespace Solid\OCP\GoodExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\OCP\GoodExample\Contracts\IPaymentMethod;

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

    public function processPayment(IPaymentMethod $paymentMethod, float $amount): void
    {
        // Delegate payment execution
        $paymentMethod->pay($amount);

        // Save to DB
        $this->repository->savePayment($paymentMethod->getName(), $amount);

        // Logging
        $this->logger->log("[GOOD][OCP] Payment: {$paymentMethod->getName()}, Amount: $amount");

        // Email
        $this->notifier->send("customer@example.com", "Payment of $amount via {$paymentMethod->getName()} completed.");
    }
}
