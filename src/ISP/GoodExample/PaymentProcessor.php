<?php
namespace Solid\ISP\GoodExample;

use Solid\ISP\Logger;
use Solid\ISP\EmailNotifier;
use Solid\ISP\PaymentRepository;
use Solid\ISP\GoodExample\Contracts\IRefundable;
use Solid\ISP\GoodExample\Contracts\IPaymentMethod;
use Solid\ISP\GoodExample\Contracts\IRecurringPayment;

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

    public function processPayment(IPaymentMethod $paymentMethod, float $amount): void
    {
        $paymentMethod->pay($amount);

        // Save the payment
        $this->repository->save($paymentMethod->getName(), $amount);

        // Log the payment
        $this->logger->log("[GOOD][ISP] Payment: " . $paymentMethod->getName() . ", Amount: $amount");

        // Notify the user
        $this->notifier->send("Payment of $amount via " . $paymentMethod->getName() . " completed.");
    }

    public function processRecurring(IRecurringPayment $paymentMethod, float $amount, string $interval): void
    {
        $paymentMethod->scheduleRecurring($amount, $interval);
    }

    public function processRefund(IRefundable $paymentMethod, float $amount): void
    {
        $paymentMethod->refund($amount);
    }
}
