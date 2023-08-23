<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://127.0.0.1:8000/midtrans/callback',
        'http://1741-2001-448a-60c0-a6ad-b54b-9c25-abe8-ae67.ngrok-free.app/midtrans/callback',
    ];
}
