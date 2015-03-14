<?php

namespace Vinkla\Tests\Algolia;

use GrahamCampbell\TestBench\Traits\ServiceProviderTestCaseTrait;

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
