<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        /** @var App\Models\User */

        $user = Auth::user();
        if($user->hasRole('Admin'))
        {
            return $next($request);
        }
        return view('AccessDenied.index');
        // return redirect('/home')->with('error', 'You are not authorized to perform this action. Please contact the administration.');
    }
}
