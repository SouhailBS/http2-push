<?php

namespace Souhail\LaravelHttp2Push;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Souhail\LaravelHttp2Push\Skeleton\SkeletonClass
 */
class LaravelHttp2PushFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-http2-push';
    }
}
