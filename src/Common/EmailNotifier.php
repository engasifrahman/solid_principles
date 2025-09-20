<?php

namespace Solid\Common;

/**
 * Class EmailNotifier
 *
 * Responsible for sending email notifications.
 */
class EmailNotifier
{
    /**
     * Send an email notification.
     *
     * @param string $message The message to send via email.
     * @return void
     */
    public function send(string $message): void
    {
        echo "Sending email: $message\n";
    }
}
