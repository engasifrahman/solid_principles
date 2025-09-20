<?php
namespace Solid\DIP\BadExample;

use Solid\DIP\Logger;
use Solid\DIP\EmailNotifier;
use Solid\DIP\PaymentRepository;
use Solid\DIP\BadExample\StripePayment;

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

    public function process(StripePayment $paymentMethod, float $amount): void
    {
        $paymentMethod->pay($amount);

        // Save the payment
        $this->repository->save($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[BAD][DIP] Payment: " . $paymentMethod->getName() . ", Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via " . $paymentMethod->getName() . " completed.");
    }
}
