<?php

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class RotatingTest extends TestCase
{
    public function testRotate()
    {
        $logger = new Logger(RotationTest::class);
        $logger->pushHandler(new RotatingFileHandler(__DIR__ . "/../application.log", 10, Logger::INFO));
        $logger->info("Coba1");
        self::assertNotNull($logger);
    }
}
