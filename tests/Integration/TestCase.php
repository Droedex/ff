<?php

namespace Droedex\FF\Tests\Integration;

use Droedex\FF\FFServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Workbench\App\Models\User;

abstract class TestCase extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            FFServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        if (!class_exists('App\\Models\\User')) {
            class_alias(User::class, 'App\\Models\\User');
        }
    }
}