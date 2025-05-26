<?php

namespace App\Http\Middlewares;

use Contracts\MiddlewareContracts;

class SimpleMiddleware implements MiddlewareContracts
{
    public function handle($request, $next)
    {
        if (1 == 2) {
            header('Location: ' . url('/'));
            exit;
        }
        return $next($request);
    }
}
