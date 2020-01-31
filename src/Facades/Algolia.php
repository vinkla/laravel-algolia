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

namespace Vinkla\Algolia\Facades;

use Illuminate\Support\Facades\Facade;

class Algolia extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'algolia';
    }
}
