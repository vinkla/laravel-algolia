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

namespace Vinkla\Algolia;

use Algolia\AlgoliaSearch\SearchClient;
use InvalidArgumentException;

/**
 * This is the Algolia factory class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class AlgoliaFactory
{
    /**
     * Make a new Algolia client.
     *
     * @param array $config
     *
     * @return \Algolia\AlgoliaSearch\SearchClient
     */
    public function make(array $config): SearchClient
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config): array
    {
        $keys = ['id', 'key'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        return array_only($config, $keys);
    }

    /**
     * Get the Algolia client.
     *
     * @param array $auth
     *
     * @return \Algolia\AlgoliaSearch\SearchClient
     */
    protected function getClient(array $auth): SearchClient
    {
        return SearchClient::create(
            $auth['id'],
            $auth['key']
        );
    }
}
