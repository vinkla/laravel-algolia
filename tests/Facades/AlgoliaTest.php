<?php

/*
 * This file is part of Laravel Algolia.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Tests\Algolia\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Vinkla\Algolia\AlgoliaManager;
use Vinkla\Algolia\Facades\Algolia;
use Vinkla\Tests\Algolia\AbstractTestCase;

/**
 * This is the Algolia facade test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AlgoliaTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'algolia';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return Algolia::class;
    }

    /**
     * Get the facade route.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return AlgoliaManager::class;
    }
}
