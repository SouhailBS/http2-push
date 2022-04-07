<?php

if (! function_exists('preload')) {
    function preload($resource, $silent = true) {
        return resolve('laravel-http2-push')->add($resource, $silent);
    }
}
