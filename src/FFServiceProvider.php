<?php

declare(strict_types=1);

namespace Droedex\FF;

use Droedex\FF\Application\FeatureManager;
use Droedex\FF\Application\FeatureSetBuilder;
use Droedex\FF\FeatureSet\Builders\FeatureFactory;
use Droedex\FF\Repository\Interfaces\RepositoryManagerInterface;
use Droedex\FF\Repository\RepositoryManager;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FFServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->app->singleton(FeatureFactory::class);
        $this->app->singleton(RepositoryManagerInterface::class, RepositoryManager::class);
        $this->app->singleton(FeatureSetBuilder::class);
        $this->app->singleton(FeatureManager::class);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [
            FeatureManager::class,
        ];
    }
}