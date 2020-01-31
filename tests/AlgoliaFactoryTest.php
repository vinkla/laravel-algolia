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

namespace Vinkla\Tests\Algolia;

use Algolia\AlgoliaSearch\SearchClient;
use InvalidArgumentException;
use Vinkla\Algolia\AlgoliaFactory;

class AlgoliaFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getAlgoliaFactory();

        $return = $factory->make([
            'id' => 'your-application-id',
            'key' => 'your-api-key',
        ]);

        $this->assertInstanceOf(SearchClient::class, $return);
    }

    public function testMakeWithoutId()
    {
        $this->expectException(InvalidArgumentException::class);

        $factory = $this->getAlgoliaFactory();

        $factory->make(['key' => 'your-api-key']);
    }

    public function testMakeWithoutKey()
    {
        $this->expectException(InvalidArgumentException::class);

        $factory = $this->getAlgoliaFactory();

        $factory->make(['id' => 'your-application-id']);
    }

    protected function getAlgoliaFactory()
    {
        return new AlgoliaFactory();
    }
}
