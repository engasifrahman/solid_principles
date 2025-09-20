<?php
namespace Solid\SRP\GoodExample;

class Logger
{
    private string $logDir;
    private string $logFile;

    public function __construct(string $logDir = __DIR__ . '/../../../demo/Logs', string $logFile = '/app.log')
    {
        $this->logDir = $logDir;
        $this->logFile = $logFile;
        $this->createLogDir();
    }

    private function createLogDir(): void
    {
        if (!is_dir($this->logDir)) {
            mkdir($this->logDir, 0777, true);
        }
    }

    public function log(string $message): void
    {
        file_put_contents($this->logDir . $this->logFile, $message . PHP_EOL, FILE_APPEND);
    }
}
