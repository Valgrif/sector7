<?php

namespace App\Http\Middleware;
use Closure;


class TestMiddleware
{
    public function handle($request, Closure $next)
    {
        $endpoint = $request->fullUrl();

        return $next($request);
    }
}
