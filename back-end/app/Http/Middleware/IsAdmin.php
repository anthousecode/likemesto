<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class IsAdmin
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
        //return $next($request);

        if (Auth::user() &&  Auth::user()->roles == 1) {
            return $next($request);
        }

        return response()->json([
            'message' => 'У вас нет прав, поскольку вы не администратор'
        ]);
    }

}
