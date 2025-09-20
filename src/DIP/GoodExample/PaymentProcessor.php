<?php

namespace Solid\DIP\GoodExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\DIP\GoodExample\Contracts\IPaymentMethod;

/**
 * Class PaymentProcessor
 *
 * Handles payment processing using dependency inversion principle (good example).
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
     * Process a payment using the provided payment method.
     *
     * @param IPaymentMethod $paymentMethod The payment method
     * @param float $amount The payment amount
     * @return void
     */
    public function process(IPaymentMethod $paymentMethod, float $amount): void
    {
        $paymentMethod->pay($amount);

        // Save the payment
        $this->repository->savePayment($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[GOOD][DIP] Payment: " . $paymentMethod->getName() . ", Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via " . $paymentMethod->getName() . " completed.");
    }
}
