<?php

/*
 * This file is part of Laravel Algolia.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Vinkla\Algolia;

use AlgoliaSearch\Client;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * This is the Algolia service provider class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AlgoliaServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/algolia.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('algolia.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('algolia');
        }

        $this->mergeConfigFrom($source, 'algolia');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory()
    {
        $this->app->singleton('algolia.factory', function () {
            return new AlgoliaFactory();
        });

        $this->app->alias('algolia.factory', AlgoliaFactory::class);
    }

    /**
     * Register the manager class.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('algolia', function (Container $app) {
            $config = $app['config'];
            $factory = $app['algolia.factory'];

            return new AlgoliaManager($config, $factory);
        });

        $this->app->alias('algolia', AlgoliaManager::class);
    }

    /**
     * Register the bindings.
     *
     * @return void
     */
    protected function registerBindings()
    {
        $this->app->bind('algolia.connection', function (Container $app) {
            $manager = $app['algolia'];

            return $manager->connection();
        });

        $this->app->alias('algolia.connection', Client::class);
    }

    /**
     * Get the services provided by the provider.
     *
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
