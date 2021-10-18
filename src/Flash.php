<?php

namespace Tonning\Flash;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tonning\Flash\FlashNotifier
 */
class Flash extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Flash::class;
    }
}
