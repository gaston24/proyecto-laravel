<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Mantenimiento
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $mantenimiento='off')
    {
        dump('Middleware Mantenimiento: handle');
        if($mantenimiento=='on'){
            return redirect('/mantenimiento');
        }
        return $next($request);
    }
    
    public function terminate($request, $response){
        dump('Middleware Mantenimiento: terminate');
    }




}
