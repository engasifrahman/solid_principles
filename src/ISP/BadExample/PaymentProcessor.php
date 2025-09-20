<?php

namespace Solid\ISP\BadExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\ISP\BadExample\Contracts\IPaymentMethod;

/**
 * Class PaymentProcessor
 *
 * Handles payment processing (bad ISP example).
 */
class PaymentProcessor
{
    /**
     * @var Logger Logger instance
     */
    private Logger $logger;

    /**
     * @var EmailNotifier Notifier instance
     */
    private EmailNotifier $notifier;

    /**
     * @var PaymentRepository Payment repository instance
     */
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
     * Process a normal payment.
     *
     * @param IPaymentMethod $paymentMethod
     * @param float $amount
     * @return void
     */
    public function processPayment(IPaymentMethod $paymentMethod, float $amount): void
    {
        $paymentMethod->pay($amount);

        // Save the payment
        $this->repository->savePayment($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[BAD][ISP] Normal Payment: " . $paymentMethod->getName() . ", Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via " . $paymentMethod->getName() . " completed.");
    }

    /**
     * Process a recurring payment.
     *
     * @param IPaymentMethod $paymentMethod
     * @param float $amount
     * @param string $interval
     * @return void
     */
    public function processRecurring(IPaymentMethod $paymentMethod, float $amount, string $interval): void
    {
        $paymentMethod->scheduleRecurring($amount, $interval);

        // Save the payment
        $this->repository->saveRecurring($paymentMethod->getName(), $amount, $interval);

        // Log the payment
        $this->logger->log("[BAD][ISP] Recurring Payment: " . $paymentMethod->getName() . ", Amount: $amount every $interval");

        // Notify the user
        $this->notifier->send("Recurring Payment of $amount every $interval via " . $paymentMethod->getName() . " completed.");
    }

    /**
     * Process a refund.
     *
     * @param IPaymentMethod $paymentMethod
     * @param float $amount
     * @param string $reason
     * @return void
     */
    public function processRefund(IPaymentMethod $paymentMethod, float $amount, string $reason): void
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
