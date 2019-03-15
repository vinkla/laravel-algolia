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
use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use Illuminate\Contracts\Config\Repository;
use Mockery;
use Vinkla\Algolia\AlgoliaFactory;
use Vinkla\Algolia\AlgoliaManager;

/**
 * This is the Algolia manager test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class AlgoliaManagerTest extends AbstractTestBenchTestCase
{
    public function testCreateConnection()
    {
        $config = ['path' => __DIR__];

        $manager = $this->getManager($config);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('algolia.default')->andReturn('algolia');

        $this->assertSame([], $manager->getConnections());

        $return = $manager->connection();

        $this->assertInstanceOf(SearchClient::class, $return);

        $this->assertArrayHasKey('algolia', $manager->getConnections());
    }

    protected function getManager(array $config)
    {
        $repository = Mockery::mock(Repository::class);
        $factory = Mockery::mock(AlgoliaFactory::class);

        $manager = new AlgoliaManager($repository, $factory);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('algolia.connections')->andReturn(['algolia' => $config]);

        $config['name'] = 'algolia';

        $manager->getFactory()->shouldReceive('make')->once()
            ->with($config)->andReturn(Mockery::mock(SearchClient::class));

        return $manager;
    }
}
