<?php
namespace Solid\SRP\BadExample;

use PDO;

class PaymentProcessor
{
    private PDO $db;

    public function __construct()
    {
        // Use memory SQLite
        $this->db = new PDO("sqlite::memory:");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->db->exec("CREATE TABLE payments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            amount REAL
        )");
    }

    public function pay(float $amount): void
    {
        // 1. Business logic (saving payment)
        $stmt = $this->db->prepare("INSERT INTO payments (amount) VALUES (:amount)");
        $stmt->execute(['amount' => $amount]);
        echo "Payment of $amount processed and saved to in-memory DB.\n";

        // 2. Logging
        file_put_contents(__DIR__ . '/../../../demo/Logs/payment.log', "[BAD][SRP] Payment of $amount processed\n", FILE_APPEND);

        // 3. Notification
        echo "Sending email: Payment of $amount completed!\n";
    }
}
