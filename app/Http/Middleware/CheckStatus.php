<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckStatus
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
        $response = $next($request);
        if (Auth::check()) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                return back()->with('wait', 'Accout Waitting');
            } elseif(Auth::user()->status == 2) {
                Auth::logout();
                return back()->with('block', 'Account Blocked');
            }
        }
        return $response;
    }
}
