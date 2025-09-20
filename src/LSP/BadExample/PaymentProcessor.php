<?php

namespace Solid\LSP\BadExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;

/**
 * Class PaymentProcessor
 *
 * Handles payment processing and buy now, pay later (BNPL) operations for payment methods.
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
     * Process a payment.
     *
     * @param PaymentMethod $paymentMethod
     * @param float $amount
     * @return void
     */
    public function processPayment(PaymentMethod $paymentMethod, float $amount)
    {
        $paymentMethod->pay($amount);

        // Save the payment
        $this->repository->savePayment($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[BAD][LSP] Payment: {$paymentMethod->getName()}, Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via {$paymentMethod->getName()} completed.");
    }

    /**
     * Process a Buy Now, Pay Later (BNPL) payment.
     *
     * @param PaymentMethod $paymentMethod
     * @param float $amount
     * @param int $installments
     * @return void
     */
    public function processBNPL(PaymentMethod $paymentMethod, float $amount, int $installments)
    {
        // This method assumes all payment methods support BNPL
        $paymentMethod->buyNowPayLater($amount, $installments);

        // Save the payment
        $this->repository->saveBNPL($paymentMethod->getName(), $amount, $installments);

        // Log the payment
        $this->logger->log("[BAD][LSP] BNPL: {$paymentMethod->getName()}, Amount: $amount in $installments installments");

        // Notify the user
        $this->notifier->send("BNPL of $amount in $installments installments via {$paymentMethod->getName()} completed.");
    }
}
