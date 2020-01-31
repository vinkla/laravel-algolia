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

namespace Vinkla\Tests\Algolia\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Vinkla\Algolia\AlgoliaManager;
use Vinkla\Algolia\Facades\Algolia;
use Vinkla\Tests\Algolia\AbstractTestCase;

class AlgoliaTest extends AbstractTestCase
{
    use FacadeTrait;

    protected function getFacadeAccessor()
    {
        return 'algolia';
    }

    protected function getFacadeClass()
    {
        return Algolia::class;
    }

    protected function getFacadeRoot()
    {
        return AlgoliaManager::class;
    }
}
