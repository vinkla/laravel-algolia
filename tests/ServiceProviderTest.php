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

use GrahamCampbell\TestBench\Traits\ServiceProviderTestCaseTrait;

/**
 * This is the service provider test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTestCaseTrait;

    public function testAlgoliaFactoryIsInjectable()
    {
        $this->assertIsInjectable('Vinkla\Algolia\Factories\AlgoliaFactory');
    }

    public function testAlgoliaManagerIsInjectable()
    {
        $this->assertIsInjectable('Vinkla\Algolia\AlgoliaManager');
    }
}
