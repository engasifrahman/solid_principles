<?php
require __DIR__ . '/../vendor/autoload.php';

use Solid\ISP\Logger;
use Solid\ISP\EmailNotifier;
use Solid\ISP\PaymentRepository;
use Solid\ISP\BadExample\PayPalPayment as BadPayPalPayment;
use Solid\ISP\BadExample\StripePayment as BadStripePayment;
use Solid\ISP\GoodExample\PayPalPayment as GoodPayPalPayment;
use Solid\ISP\GoodExample\StripePayment as GoodStripePayment;
use Solid\ISP\BadExample\PaymentProcessor as BadPaymentProcessor;
use Solid\ISP\GoodExample\PaymentProcessor as GoodPaymentProcessor;

$logDir = __DIR__ . "/Logs";
if (!is_dir($logDir)) mkdir($logDir, 0777, true);


echo "==== BAD ISP ====\n";

$processor = new BadPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);
$stripe = new BadStripePayment();
$paypal = new BadPayPalPayment();

$processor->processPayment($stripe, 1000);
$processor->processRecurring($stripe, 1500, 'monthly');

$processor->processPayment($paypal, 2000);

try {
    $processor->processRecurring($paypal, 2500, 'monthly'); // ❌ Fails
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n==== GOOD ISP ====\n";

$processor = new GoodPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);

$stripe = new GoodStripePayment();
$paypal = new GoodPayPalPayment();

$processor->processPayment($stripe, 1000);
$processor->processRecurring($stripe, 1500, 'monthly');
$processor->processRefund($stripe, 500);

$processor->processPayment($paypal, 2000);
$processor->processRefund($paypal, 1000);
// No recurring method needed for PayPal → ISP respected
