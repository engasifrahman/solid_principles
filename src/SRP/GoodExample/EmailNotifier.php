<?php
namespace Solid\SRP\GoodExample;

class EmailNotifier
{
    public function send(string $message): void
    {
        echo "Sending email: $message\n";
    }
}
