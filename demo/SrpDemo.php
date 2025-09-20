<?php

require __DIR__ . '/../vendor/autoload.php';

use Solid\Common\Logger;
use Solid\Common\EmailNotifier;
use Solid\Common\PaymentRepository;
use Solid\SRP\BadExample\PaymentProcessor as BadPaymentProcessor;
use Solid\SRP\GoodExample\PaymentProcessor as GoodPaymentProcessor;

echo "=========== BAD EXAMPLE ===========\n";
$bad = new BadPaymentProcessor();
$bad->pay(5000);

/* -------------------------------------------------------------------------- */

echo "\n=========== GOOD EXAMPLE ===========\n";
$good = new GoodPaymentProcessor(new PaymentRepository(), new Logger(), new EmailNotifier());
$good->pay(5000);

echo "\nCheck logs at demo/Logs/app.log\n";
