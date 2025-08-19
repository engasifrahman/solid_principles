<?php
namespace Solid\ISP;

class EmailNotifier
{
    public function send(string $message): void
    {
        echo "Sending email: $message\n";
    }
}
