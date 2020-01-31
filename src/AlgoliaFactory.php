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
use Illuminate\Support\Arr;
use InvalidArgumentException;

class AlgoliaFactory
{
    public function make(array $config): SearchClient
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * @throws \InvalidArgumentException
     */
    protected function getConfig(array $config): array
    {
        $keys = ['id', 'key'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        return Arr::only($config, $keys);
    }

    protected function getClient(array $auth): SearchClient
    {
        return SearchClient::create(
            $auth['id'],
            $auth['key']
        );
    }
}
