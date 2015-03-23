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

use GrahamCampbell\TestBench\Traits\FacadeTestCaseTrait;
use Vinkla\Tests\Algolia\AbstractTestCase;

/**
 * This is the Algolia facade test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AlgoliaTest extends AbstractTestCase
{
    use FacadeTestCaseTrait;

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
        return 'Vinkla\Algolia\Facades\Algolia';
    }

    /**
     * Get the facade route.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return 'Vinkla\Algolia\AlgoliaManager';
    }
}
