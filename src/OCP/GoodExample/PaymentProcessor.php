<?php

namespace Solid\OCP\GoodExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\OCP\GoodExample\Contracts\IPaymentMethod;

/**
 * Class PaymentProcessor
 *
 * Handles payment processing using the Open/Closed Principle (OCP) with payment method contracts.
 */
class PaymentProcessor
{
    private Logger $logger;
    private EmailNotifier $notifier;
    private PaymentRepository $repository;

    /**
     * PaymentProcessor constructor.
     *
     * @param PaymentRepository $repository
     * @param Logger $logger
     * @param EmailNotifier $notifier
     */
    public function __construct(PaymentRepository $repository, Logger $logger, EmailNotifier $notifier)
    {
        $this->repository = $repository;
        $this->logger = $logger;
        $this->notifier = $notifier;
    }

    /**
     * Process a payment using the provided payment method.
     *
     * @param IPaymentMethod $paymentMethod
     * @param float $amount
     * @return void
     */
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
