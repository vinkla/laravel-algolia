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

namespace Vinkla\Algolia\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Algolia facade class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Algolia extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'algolia';
    }
}
