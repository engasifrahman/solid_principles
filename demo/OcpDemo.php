<?php

require __DIR__ . '/../vendor/autoload.php';

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\OCP\GoodExample\PaypalPayment;
use Solid\OCP\GoodExample\StripePayment;
use Solid\OCP\BadExample\PaymentProcessor as BadPaymentProcessor;
use Solid\OCP\GoodExample\PaymentProcessor as GoodPaymentProcessor;

echo "============ BAD OCP ============\n";
$bad = new BadPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);

echo "\n---- Stripe payment ----\n";
$bad->pay("stripe", 1000);

echo "\n---- PayPal payment ----\n";
$bad->pay("paypal", 2000);

/* -------------------------------------------------------------------------- */

echo "\n============ GOOD OCP ============\n";
$good = new GoodPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);

echo "\n---- Stripe payment ----\n";
$good->processPayment(new StripePayment(), 1000);

echo "\n---- PayPal payment ----\n";
$good->processPayment(new PaypalPayment(), 2000);

echo "\nCheck logs at demo/Logs/app.log\n";
