<?php

namespace Rizal\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function testMonolog()
    {
        $logger = new Logger(LoggerTest::class);
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
        $logger->pushHandler(new StreamHandler("php://strderr"));
        self::assertNotNull($logger);
    }
}
