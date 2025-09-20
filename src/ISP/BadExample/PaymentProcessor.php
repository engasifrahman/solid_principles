<?php
namespace Solid\ISP\BadExample;

use Solid\ISP\Logger;
use Solid\ISP\EmailNotifier;
use Solid\ISP\PaymentRepository;
use Solid\ISP\BadExample\PaymentGateway;

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

    public function processPayment(IPaymentGateway $paymentMethod, float $amount)
    {
        $paymentMethod->pay($amount);
        $this->repository->save(get_class($paymentMethod), $amount);
        $this->logger->log("[BAD][ISP] Payment: " . get_class($paymentMethod) . ", Amount: $amount");
        $this->notifier->send("Payment of $amount via " . get_class($paymentMethod) . " completed.");
    }

    public function processRecurring(IPaymentGateway $paymentMethod, float $amount, string $interval)
    {
        $paymentMethod->scheduleRecurring($amount, $interval);
    }

    public function processRefund(IPaymentGateway $paymentMethod, float $amount)
    {
        $paymentMethod->refund($amount);
    }
}
