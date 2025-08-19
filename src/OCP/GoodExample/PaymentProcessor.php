<?php
namespace Solid\OCP\GoodExample;

use Solid\OCP\Logger;
use Solid\OCP\EmailNotifier;
use Solid\OCP\PaymentRepository;
use Solid\OCP\GoodExample\Contracts\PaymentMethod;

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

    public function processPayment(PaymentMethod $paymentMethod, float $amount): void
    {
        // Delegate payment execution
        $paymentMethod->pay($amount);

        // Save to DB
        $this->repository->save($paymentMethod->getName(), $amount);

        // Logging
        $this->logger->log("[GOOD][OCP] Payment: {$paymentMethod->getName()}, Amount: $amount");

        // Email
        $this->notifier->send("customer@example.com", "Payment of $amount via {$paymentMethod->getName()} completed.");
    }
}
