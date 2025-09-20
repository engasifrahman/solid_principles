<?php

namespace Solid\Common;

use PDO;

/**
 * Class PaymentRepository
 *
 * Handles payment-related database operations.
 */
class PaymentRepository
{
    /**
     * @var PDO Database connection
     */
    private PDO $db;

    /**
     * PaymentRepository constructor.
     *
     * Initializes the in-memory SQLite database and schema.
     */
    public function __construct()
    {
        $this->db = new PDO('sqlite::memory:');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->initSchema();
    }

    /**
     * Initializes the payments table schema.
     *
     * @return void
     */
    private function initSchema(): void
    {
        $this->db->exec(
            "CREATE TABLE IF NOT EXISTS payments (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                method TEXT,
                amount REAL,
                type TEXT,
                details TEXT,
                created_at TEXT
            )"
        );
    }

    /**
     * Save a payment record.
     *
     * @param string|null $method Payment method
     * @param float $amount Payment amount
     * @return void
     */
    public function savePayment(?string $method, float $amount): void
    {
        $stmt = $this->db->prepare(
            "INSERT INTO payments (method, amount, type, details, created_at) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$method, $amount, 'payment', null, date('Y-m-d H:i:s')]);
    }

    /**
     * Save a refund record.
     *
     * @param string $method Payment method
     * @param float $amount Refund amount
     * @param string $reason Reason for refund
     * @return void
     */
    public function saveRefund(string $method, float $amount, string $reason): void
    {
        $stmt = $this->db->prepare(
            "INSERT INTO payments (method, amount, type, details, created_at) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$method, $amount, 'refund', $reason, date('Y-m-d H:i:s')]);
    }

    /**
     * Save a recurring payment record.
     *
     * @param string $method Payment method
     * @param float $amount Payment amount
     * @param string $interval Recurrence interval
     * @return void
     */
    public function saveRecurring(string $method, float $amount, string $interval): void
    {
        $details = "Recurring every $interval";
        $stmt = $this->db->prepare(
            "INSERT INTO payments (method, amount, type, details, created_at) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$method, $amount, 'recurring', $details, date('Y-m-d H:i:s')]);
    }

    /**
     * Save a Buy Now Pay Later (BNPL) payment record.
     *
     * @param string $method Payment method
     * @param float $amount Payment amount
     * @param int $installments Number of installments
     * @return void
     */
    public function saveBNPL(string $method, float $amount, int $installments): void
    {
        $details = "BNPL in $installments installments";
        $stmt = $this->db->prepare(
            "INSERT INTO payments (method, amount, type, details, created_at) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$method, $amount, 'bnpl', $details, date('Y-m-d H:i:s')]);
    }

    /**
     * Get all payment records.
     *
     * @return array List of all payments
     */
    public function getAllPayments(): array
    {
        $stmt = $this->db->query("SELECT * FROM payments ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
