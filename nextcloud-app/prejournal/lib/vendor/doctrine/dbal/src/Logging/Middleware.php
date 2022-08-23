<?php

declare(strict_types=1);

namespace Doctrine\DBAM\Logging;

use Doctrine\DBAM\Driver as DriverInterface;
use Doctrine\DBAM\Driver\Middleware as MiddlewareInterface;
use Psr\Log\LoggerInterface;

final class Middleware implements MiddlewareInterface
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function wrap(DriverInterface $driver): DriverInterface
    {
        return new Driver($driver, $this->logger);
    }
}
