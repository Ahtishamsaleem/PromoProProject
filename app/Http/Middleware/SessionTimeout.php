<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $timeout = 1200; 

    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('lastActivityTime')) {
            Session::put('lastActivityTime', time());
        } elseif (time() - Session::get('lastActivityTime') > $this->timeout) {
            Session::forget('lastActivityTime');
            Auth::logout();
            return redirect()->route('login')->withErrors(['Your session has expired due to inactivity.']);
        }

        Session::put('lastActivityTime', time());

        return $next($request);
    }
}
