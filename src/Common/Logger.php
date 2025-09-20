<?php

namespace Solid\Common;

/**
 * Class Logger
 *
 * Handles logging messages to a file.
 */
class Logger
{
    /**
     * @var string Directory where log files are stored
     */
    private string $logDir;

    /**
     * @var string Log file name (with leading slash)
     */
    private string $logFile;

    /**
     * Logger constructor.
     *
     * @param string $logDir  Directory for log files
     * @param string $logFile Log file name (with leading slash)
     */
    public function __construct(string $logDir = __DIR__ . '/../../demo/Logs', string $logFile = '/app.log')
    {
        $this->logDir = $logDir;
        $this->logFile = $logFile;
        $this->createLogDir();
    }

    /**
     * Create the log directory if it does not exist.
     *
     * @return void
     */
    private function createLogDir(): void
    {
        if (!is_dir($this->logDir)) {
            mkdir($this->logDir, 0777, true);
        }
    }

    /**
     * Write a message to the log file.
     *
     * @param string $message The message to log
     * @return void
     */
    public function log(string $message): void
    {
        file_put_contents($this->logDir . $this->logFile, $message . PHP_EOL, FILE_APPEND);
    }
}
