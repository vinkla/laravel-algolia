<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/laravel-algolia
 */

declare(strict_types=1);

namespace Vinkla\Algolia;

use Algolia\AlgoliaSearch\SearchClient;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class AlgoliaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->setupConfig();
    }

    protected function setupConfig(): void
    {
        $source = realpath($raw = __DIR__ . '/../config/algolia.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('algolia.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('algolia');
        }

        $this->mergeConfigFrom($source, 'algolia');
    }

    public function register(): void
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    protected function registerFactory(): void
    {
        $this->app->singleton('algolia.factory', function () {
            return new AlgoliaFactory();
        });

        $this->app->alias('algolia.factory', AlgoliaFactory::class);
    }

    protected function registerManager(): void
    {
        $this->app->singleton('algolia', function (Container $app) {
            $config = $app['config'];
            $factory = $app['algolia.factory'];

            return new AlgoliaManager($config, $factory);
        });

        $this->app->alias('algolia', AlgoliaManager::class);
    }

    protected function registerBindings(): void
    {
        $this->app->bind('algolia.connection', function (Container $app) {
            $manager = $app['algolia'];

            return $manager->connection();
        });

        $this->app->alias('algolia.connection', SearchClient::class);
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'algolia',
            'algolia.factory',
            'algolia.connection',
        ];
    }
}
