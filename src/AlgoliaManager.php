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
use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class AlgoliaManager extends AbstractManager
{
    protected AlgoliaFactory $factory;

    public function __construct(Repository $config, AlgoliaFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    protected function createConnection(array $config): SearchClient
    {
        return $this->factory->make($config);
    }

    protected function getConfigName(): string
    {
        return 'algolia';
    }

    public function getFactory(): AlgoliaFactory
    {
        return $this->factory;
    }
}
