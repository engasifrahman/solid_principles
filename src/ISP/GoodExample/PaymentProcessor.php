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
        $this->repository->save(get_class($paymentMethod), $amount);
        $this->logger->log("[GOOD][ISP] Payment: " . get_class($paymentMethod) . ", Amount: $amount");
        $this->notifier->send("Payment of $amount via " . get_class($paymentMethod) . " completed.");
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
