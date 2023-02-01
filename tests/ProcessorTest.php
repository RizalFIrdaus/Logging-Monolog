<?php

namespace Rizal\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessor()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
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
