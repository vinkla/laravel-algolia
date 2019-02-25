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

namespace Vinkla\Tests\Algolia;

use Algolia\AlgoliaSearch\SearchClient;
use InvalidArgumentException;
use Vinkla\Algolia\AlgoliaFactory;

/**
 * This is the Algolia factory test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
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
