<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'http://localhost:8000/pay',
        'http://localhost:8000/orders/pay/*',
        'http://localhost:8000/video/save',
        'https://c9d9f9062250.ngrok.io/video/save',
        'https://c9d9f9062250.ngrok.io/pay',
        'https://c9d9f9062250.ngrok.io/orders/pay/*'
    ];
}
