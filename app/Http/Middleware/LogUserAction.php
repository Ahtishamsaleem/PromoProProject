<?php

namespace App\Http\Middleware;

use App\Models\UserLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogUserAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            $action = $request->route()->getName();
            $description = $this->generateDescription($request);

            UserLog::create([
                'user_id' => Auth::id(),
                'action' => $action,
                'description' => $description,
            ]);
        }

        return $response;
    }

    private function generateDescription(Request $request)
    {
        // Customize this function to generate a detailed description of the action
        return json_encode($request->all());
    }
}
