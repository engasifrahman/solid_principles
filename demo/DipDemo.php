<?php
require __DIR__ . '/../vendor/autoload.php';

use Solid\DIP\Logger;
use Solid\DIP\EmailNotifier;
use Solid\DIP\PaymentRepository;
use Solid\DIP\BadExample\StripePayment AS BadStripePayment;
use Solid\DIP\GoodExample\PayPalPayment AS GoodPayPalPayment;
use Solid\DIP\GoodExample\StripePayment AS GoodStripePayment;
use Solid\DIP\BadExample\PaymentProcessor AS BadPaymentProcessor;
use Solid\DIP\GoodExample\PaymentProcessor AS GoodPaymentProcessor;

echo "============ BAD DIP ============\n";
$processor = new BadPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);

echo "\n---- Stripe payment ----\n";
$processor->process(new BadStripePayment(), 1000); // Only works with Stripe ❌

/* -------------------------------------------------------------------------- */

echo "\n============ GOOD DIP ============\n";
$processor = new GoodPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);

echo "\n---- Stripe payment ----\n";
$processor->process(new GoodStripePayment(), 1000);

echo "\n---- PayPal payment ----\n";
$processor->process(new GoodPayPalPayment(), 500);

echo "\nCheck logs at demo/Logs/app.log\n";

