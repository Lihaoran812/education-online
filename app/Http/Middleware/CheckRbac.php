<?php

namespace App\Http\Middleware;

use Closure;

class CheckRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //鉴权
       // phpinfo();
        return $next($request);
    }
}
