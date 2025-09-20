<?php
require __DIR__ . '/../vendor/autoload.php';

use Solid\OCP\Logger;
use Solid\OCP\EmailNotifier;
use Solid\OCP\PaymentRepository;
use Solid\OCP\GoodExample\PaypalPayment;
use Solid\OCP\GoodExample\StripePayment;
use Solid\OCP\BadExample\PaymentProcessor as BadPaymentProcessor;
use Solid\OCP\GoodExample\PaymentProcessor as GoodPaymentProcessor;

echo "==== BAD OCP (Stripe + PayPal) ====\n";
$bad = new BadPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);
$bad->pay("stripe", 1000);
$bad->pay("paypal", 2000);

echo "\n==== GOOD OCP (Stripe + PayPal) ====\n";
$good = new GoodPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);
$good->processPayment(new StripePayment(), 1000);
$good->processPayment(new PaypalPayment(), 2000);

echo "\nCheck logs at demo/Logs/payment.log\n";
