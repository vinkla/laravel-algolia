<?php

namespace Vinkla\Tests\Algolia\Factories;

use Vinkla\Algolia\Factories\AlgoliaFactory;
use Vinkla\Tests\Algolia\AbstractTestCase;

class AlgoliaFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getAlgoliaFactory();

        $return = $factory->make([
            'id' => 'your-application-id',
            'key' => 'your-api-key',
        ]);

        $this->assertInstanceOf('AlgoliaSearch\Client', $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutClientId()
    {
        $factory = $this->getAlgoliaFactory();

        $factory->make([]);
    }

    protected function getAlgoliaFactory()
    {
        return new AlgoliaFactory();
    }
}
