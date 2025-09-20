<?php

namespace Solid\SRP\GoodExample;

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;

class PaymentProcessor
{
    private PaymentRepository $repository;
    private Logger $logger;
    private EmailNotifier $notifier;

    public function __construct(PaymentRepository $repository, Logger $logger, EmailNotifier $notifier)
    {
        $this->repository = $repository;
        $this->logger     = $logger;
        $this->notifier   = $notifier;
    }

    public function pay(float $amount): void
    {
        // 1. Business logic (only payment responsibility)
        $this->repository->savePayment(null, $amount);
        echo "Payment of $amount processed and saved to in-memory DB.\n";

        // Delegate other responsibilities
        $this->logger->log("[GOOD][SRP] Payment of $amount processed");
        $this->notifier->send("Payment of $amount completed!");
    }
}
