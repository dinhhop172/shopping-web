<?php

namespace App\Http\Middleware;

use Closure;

class Checkout
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
        if (auth()->guard($guard)->check() && count(session()->get('cart')) > 0) {
            return $next($request);
        } else {
            alert()->warning('Vui lòng đăng nhập và số lượng cart phải lớn hơn 0 để tiếp tục');
            return redirect(route('cart.show'));
        }
    }
}
