<?php

namespace Rizal\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", Logger::ERROR));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log", Logger::INFO));
        $logger->info("Successful Login", ["username" => "rizal300500"]);
        $logger->error("Error Login", ["username" => "_Rizal"]);
        self::assertNotNull($logger);
    }
}
