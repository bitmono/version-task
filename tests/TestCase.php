<?php

namespace Bitmono\VersionTask\Tests;

use Bitmono\VersionTask\VersionTaskServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * {@inheritDoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            EnversionerServiceProvider::class,
        ];
    }
}