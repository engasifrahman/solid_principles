<?php

require __DIR__ . '/../vendor/autoload.php';

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\LSP\badExample\PaypalPayment as badPaypalPayment;
use Solid\LSP\badExample\StripePayment as badStripePayment;
use Solid\LSP\GoodExample\PaypalPayment as GoodPaypalPayment;
use Solid\LSP\GoodExample\StripePayment as GoodStripePayment;
use Solid\LSP\BadExample\PaymentProcessor as BadPaymentProcessor;
use Solid\LSP\GoodExample\PaymentProcessor as GoodPaymentProcessor;

echo "============ BAD LSP Demo ============\n";
$processor = new BadPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);
$stripe = new BadStripePayment();
$paypal = new BadPayPalPayment();

echo "\n---- Stripe normal payment ----\n";
$processor->processPayment($stripe, 1000);      // ✅ Works

echo "\n---- Stripe BNPL ----\n";
$processor->processBNPL($stripe, 1500, 3);     // ✅ Works

echo "\n---- PayPal normal payment ----\n";
$processor->processPayment($paypal, 2000);     // ✅ Works

echo "\n---- PayPal BNPL ----\n";
try {
    $processor->processBNPL($paypal, 2500, 3); // ❌ Fails: violates LSP
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

/* -------------------------------------------------------------------------- */

echo "\n============ GOOD LSP ============\n";
$processor = new GoodPaymentProcessor(
    new PaymentRepository(),
    new Logger(),
    new EmailNotifier()
);

$stripe = new GoodStripePayment();
$paypal = new GoodPaypalPayment();

echo "\n---- Stripe normal payment ----\n";
$processor->processPayment($stripe, 2000);

echo "\n---- Stripe BNPL ----\n";
$processor->processBNPL($stripe, 1500, 3);

echo "\n---- PayPal normal payment ----\n";
$processor->processPayment($paypal, 2500);

// We didnt executed BNPL for PayPal because GoodPaypalPayment did not implement BuyNowPayLater, So it respects LSP

echo "\nCheck logs at demo/Logs/app.log\n";
