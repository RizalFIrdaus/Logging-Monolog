<?php

namespace Rizal\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LevelTest extends TestCase
{
    public function testLevel()
    {
        $logger = new Logger(LevelTest::class);
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log", Logger::INFO));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::ERROR));
        $logger->info("Info Level");
        $logger->emergency("Emergency Level");
        $logger->debug("Debug Level");
        $logger->alert("Alert Level");
        $logger->critical("Critical Level");
        $logger->notice("Notice Level");
        self::assertNotNull($logger);
    }
}
