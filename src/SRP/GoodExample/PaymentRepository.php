<?php
namespace Solid\SRP\GoodExample;

use PDO;

class PaymentRepository
{
    private PDO $db;

    public function __construct()
    {
        // Memory SQLite
        $this->db = new PDO("sqlite::memory:");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->db->exec("CREATE TABLE payments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            amount REAL
        )");
    }

    public function save(float $amount): void
    {
        $stmt = $this->db->prepare("INSERT INTO payments (amount) VALUES (:amount)");
        $stmt->execute(['amount' => $amount]);
    }
}
