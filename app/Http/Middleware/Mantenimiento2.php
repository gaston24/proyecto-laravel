<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Mantenimiento2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        dump('Middleware Mantenimiento2: handle');
        // return $next($request);
    }

    public function terminate($request, $response){
        dump('Middleware Mantenimiento2: terminate');
    }
}
