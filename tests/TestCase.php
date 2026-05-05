<?php

declare(strict_types=1);

namespace Creode\ModularAi\Tests;

use Creode\ModularAi\Providers\ModularAiServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ModularAiServiceProvider::class,
        ];
    }
}

