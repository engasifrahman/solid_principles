<?php

namespace Solid\DIP\BadExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;

/**
 * Class PaymentProcessor
 *
 * Handles payment processing using StripePayment (bad DIP example).
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
     * Process a payment using StripePayment.
     *
     * @param StripePayment $paymentMethod The payment method
     * @param float $amount The payment amount
     * @return void
     */
    public function process(StripePayment $paymentMethod, float $amount): void
    {
        $paymentMethod->pay($amount);

        // Save the payment
        $this->repository->savePayment($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[BAD][DIP] Payment: " . $paymentMethod->getName() . ", Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via " . $paymentMethod->getName() . " completed.");
    }
}
