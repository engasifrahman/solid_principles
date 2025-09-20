<?php

require __DIR__ . '/../vendor/autoload.php';

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\DIP\BadExample\StripePayment as BadStripePayment;
use Solid\DIP\GoodExample\PayPalPayment as GoodPayPalPayment;
use Solid\DIP\GoodExample\StripePayment as GoodStripePayment;
use Solid\DIP\BadExample\PaymentProcessor as BadPaymentProcessor;
use Solid\DIP\GoodExample\PaymentProcessor as GoodPaymentProcessor;

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
