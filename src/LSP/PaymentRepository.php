<?php
namespace Solid\LSP;

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
            method TEXT NOT NULL,
            amount REAL
        )");
    }

    public function save(string $method, float $amount): void
    {
        $stmt = $this->db->prepare("INSERT INTO payments (method, amount) VALUES (?, ?)");
        $stmt->execute([$method, $amount]);
    }
}
