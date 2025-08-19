<?php
namespace Solid\LSP\BadExample;

use Solid\LSP\Logger;
use Solid\LSP\EmailNotifier;
use Solid\LSP\PaymentRepository;

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

    public function processPayment(PaymentMethod $paymentMethod, float $amount)
    {
        $paymentMethod->pay($amount);

        // Save the payment
        $this->repository->save($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[BAD][LSP] Payment: {$paymentMethod->getName()}, Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via {$paymentMethod->getName()} completed.");
    }

    public function processBNPL(PaymentMethod $paymentMethod, float $amount, int $installments)
    {
        // This method assumes all payment methods support BNPL
        $paymentMethod->buyNowPayLater($amount, $installments);

        // Save the payment
        $this->repository->save($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[BAD][LSP] BNPL: {$paymentMethod->getName()}, Amount: $amount");

        // Notify the user
        $this->notifier->send("BNPL of $amount via {$paymentMethod->getName()} completed.");
    }
}