<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'customer')
    {
        if (auth()->guard($guard)->check()) {
            return $next($request);
        } else {
            alert()->warning('Vui lòng đăng nhập để tiếp tục');
            return redirect('/');
        }
    }
}
