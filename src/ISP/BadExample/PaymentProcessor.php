<?php

namespace Solid\ISP\BadExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\ISP\BadExample\Contracts\IPaymentMethod;

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

    public function processPayment(IPaymentMethod $paymentMethod, float $amount)
    {
        $paymentMethod->pay($amount);

        // Save the payment
        $this->repository->savePayment($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[BAD][ISP] Normal Payment: " . $paymentMethod->getName() . ", Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via " . $paymentMethod->getName() . " completed.");
    }

    public function processRecurring(IPaymentMethod $paymentMethod, float $amount, string $interval)
    {
        $paymentMethod->scheduleRecurring($amount, $interval);

        // Save the payment
        $this->repository->saveRecurring($paymentMethod->getName(), $amount, $interval);

        // Log the payment
        $this->logger->log("[BAD][ISP] Recurring Payment: " . $paymentMethod->getName() . ", Amount: $amount every $interval");

        // Notify the user
        $this->notifier->send("Recurring Payment of $amount every $interval via " . $paymentMethod->getName() . " completed.");
    }

    public function processRefund(IPaymentMethod $paymentMethod, float $amount, string $reason)
    {
        $paymentMethod->refund($amount);

        // Save the payment
        $this->repository->saveRefund($paymentMethod->getName(), $amount, $reason);

        // Log the payment
        $this->logger->log("[BAD][ISP] Refund: " . $paymentMethod->getName() . ", Amount: $amount due to $reason");

        // Notify the user
        $this->notifier->send("Refund of $amount due to $reason via " . $paymentMethod->getName() . " completed.");
    }
}
