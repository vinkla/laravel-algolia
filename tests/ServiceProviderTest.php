<?php

/*
 * This file is part of Laravel Algolia.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Vinkla\Tests\Algolia;

use Algolia\AlgoliaSearch\SearchClient;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Vinkla\Algolia\AlgoliaFactory;
use Vinkla\Algolia\AlgoliaManager;

/**
 * This is the service provider test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testAlgoliaFactoryIsInjectable()
    {
        $this->assertIsInjectable(AlgoliaFactory::class);
    }

    public function testAlgoliaManagerIsInjectable()
    {
        $this->assertIsInjectable(AlgoliaManager::class);
    }

    public function testBindings()
    {
        $this->assertIsInjectable(SearchClient::class);

        $original = $this->app['algolia.connection'];
        $this->app['algolia']->reconnect();
        $new = $this->app['algolia.connection'];

        $this->assertNotSame($original, $new);
        $this->assertSame(get_class($original), get_class($new));
    }
}
