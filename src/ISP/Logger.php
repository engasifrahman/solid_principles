<?php
namespace Solid\ISP;

class Logger
{
    public function log(string $message): void
    {
        file_put_contents(__DIR__ . '/../../demo/Logs/payment.log', $message . "\n", FILE_APPEND);
    }
}
