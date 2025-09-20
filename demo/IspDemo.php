<?php

require __DIR__ . '/../vendor/autoload.php';

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\ISP\BadExample\PayPalPayment as BadPayPalPayment;
use Solid\ISP\BadExample\StripePayment as BadStripePayment;
use Solid\ISP\GoodExample\PayPalPayment as GoodPayPalPayment;
use Solid\ISP\GoodExample\StripePayment as GoodStripePayment;
use Solid\ISP\BadExample\PaymentProcessor as BadPaymentProcessor;
use Solid\ISP\GoodExample\PaymentProcessor as GoodPaymentProcessor;

echo "============ BAD ISP ============\n";

$processor = new BadPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);
$stripe = new BadStripePayment();
$paypal = new BadPayPalPayment();

echo "\n---- Stripe normal payment ----\n";
$processor->processPayment($stripe, 1000);

echo "\n---- Stripe recurring payment ----\n";
$processor->processRecurring($stripe, 1500, 'monthly');

echo "\n---- Stripe refund ----\n";
$processor->processRefund($stripe, 500, 'Product defect');

echo "\n---- PayPal normal payment ----\n";
$processor->processPayment($paypal, 2000);

echo "\n---- PayPal recurring payment ----\n";
try {
    $processor->processRecurring($paypal, 2500, 'monthly'); // ❌ Fails
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n---- PayPal refund ----\n";
$processor->processRefund($paypal, 1000, 'Order cancellation');

/* -------------------------------------------------------------------------- */

echo "\n============ GOOD ISP ============\n";

$processor = new GoodPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);

$stripe = new GoodStripePayment();
$paypal = new GoodPayPalPayment();

echo "\n---- Stripe normal payment ----\n";
$processor->processPayment($stripe, 1000);

echo "\n---- Stripe recurring payment ----\n";
$processor->processRecurring($stripe, 1500, 'monthly');

echo "\n---- Stripe refund ----\n";
$processor->processRefund($stripe, 500, 'Product defect');

echo "\n---- PayPal normal payment ----\n";
$processor->processPayment($paypal, 2000);

echo "\n---- PayPal refund ----\n";
$processor->processRefund($paypal, 1000, 'Order cancellation');

// No recurring method needed for PayPal → ISP respected

echo "\nCheck logs at demo/Logs/app.log\n";
