<?php
namespace Solid\SRP\GoodExample;

class Logger
{
    public function log(string $message): void
    {
        file_put_contents('Logs/payment.log', $message . "\n", FILE_APPEND);
    }
}
