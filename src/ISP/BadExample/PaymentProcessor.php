<?php
namespace Solid\ISP\BadExample;

use Solid\ISP\Logger;
use Solid\ISP\EmailNotifier;
use Solid\ISP\PaymentRepository;
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
        $this->repository->save($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[BAD][ISP] Payment: " . $paymentMethod->getName() . ", Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via " . $paymentMethod->getName() . " completed.");
    }

    public function processRecurring(IPaymentMethod $paymentMethod, float $amount, string $interval)
    {
        $paymentMethod->scheduleRecurring($amount, $interval);
    }

    public function processRefund(IPaymentMethod $paymentMethod, float $amount)
    {
        $paymentMethod->refund($amount);
    }
}
