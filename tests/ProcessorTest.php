<?php

namespace Rizal\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\WebProcessor;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessor()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(new WebProcessor());
        $logger->pushProcessor(function ($record) {
            $record["extra"]["app"] = [
                "author" => "Rizal",
                "app" => "Belajar PHP Logger"
            ];
            return $record;
        });
        $logger->info("Hello", ["test" => "test"]);
        self::assertNotNull($logger);
    }
}
