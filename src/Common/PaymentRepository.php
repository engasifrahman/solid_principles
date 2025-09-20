<?php

namespace Solid\Common;

use PDO;

class PaymentRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite::memory:');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->initSchema();
    }

    private function initSchema(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS payments (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                method TEXT,
                amount REAL,
                type TEXT,
                details TEXT,
                created_at TEXT
            )
        ");
    }

    public function savePayment(?string $method, float $amount): void
    {
        $stmt = $this->db->prepare(
            "INSERT INTO payments (method, amount, type, details, created_at) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$method, $amount, 'payment', null, date('Y-m-d H:i:s')]);
    }

    public function saveRefund(string $method, float $amount, string $reason): void
    {
        $stmt = $this->db->prepare(
            "INSERT INTO payments (method, amount, type, details, created_at) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$method, $amount, 'refund', $reason, date('Y-m-d H:i:s')]);
    }

    public function saveRecurring(string $method, float $amount, string $interval): void
    {
        $details = "Recurring every $interval";
        $stmt = $this->db->prepare(
            "INSERT INTO payments (method, amount, type, details, created_at) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$method, $amount, 'recurring', $details, date('Y-m-d H:i:s')]);
    }

    public function saveBNPL(string $method, float $amount, int $installments): void
    {
        $details = "BNPL in $installments installments";
        $stmt = $this->db->prepare(
            "INSERT INTO payments (method, amount, type, details, created_at) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$method, $amount, 'bnpl', $details, date('Y-m-d H:i:s')]);
    }

    public function getAllPayments(): array
    {
        $stmt = $this->db->query("SELECT * FROM payments ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
