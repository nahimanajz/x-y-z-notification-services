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
    protected $except = ['*']; //limit all routes to reject csrf token
    //specifiy specific route  to reject csrf token
   /* '/api/signup',
        '/api/login',
        '/api/subscribe',
        '/api/change/subscription/{id}'
    */
}
