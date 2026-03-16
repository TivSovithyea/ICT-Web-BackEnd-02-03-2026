<?php


class Logger {
    public function __construct(protected $channel) {}

    public function log($msg) {
        echo "[$this->channel] $msg";
    }
}

class FileLog extends Logger {
    function __construct(private $path)
    {
        parent::__construct('file');
    }

    function log($msg) {
        parent::log($msg);
        file_put_contents($this->path, $msg, FILE_APPEND);
    }
}


class DatabaseLog extends Logger {
    function __construct(private $table)
    {
        parent::__construct('database');
    }

    function log($msg) {
        parent::log($msg);
        // Logic save message to database
    }
}


$fileLog = new FileLog("/log.txt");
$fileLog->log("This is my first Log from File");

$databaseLog = new DatabaseLog("logs");
$databaseLog->log("This is my first Log From database");