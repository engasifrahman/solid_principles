<?php
namespace Solid\DIP;

class EmailNotifier
{
    public function send(string $message): void
    {
        echo "Sending email: $message\n";
    }
}
