<?php

/*
 * This file is part of Laravel Algolia.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Tests\Algolia;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Vinkla\Algolia\AlgoliaManager;
use Vinkla\Algolia\AlgoliaFactory;

/**
 * This is the service provider test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
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
}
