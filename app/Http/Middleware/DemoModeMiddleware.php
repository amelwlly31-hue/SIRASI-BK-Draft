<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoModeMiddleware
{
    /**
     * Allowed routes or URIs for mutating requests in demo mode.
     *
     * @var array<int, string>
     */
    protected array $allowedRouteNames = [
        'login.process',
    ];

    protected array $allowedPaths = [
        'login',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!config('app.demo_mode', false)) {
            return $next($request);
        }

        // Allow read-only HTTP methods
        if (in_array($request->method(), ['GET', 'HEAD', 'OPTIONS'], true)) {
            return $next($request);
        }

        // Allow auth actions
        $currentRouteName = optional($request->route())->getName();
        if ($currentRouteName && in_array($currentRouteName, $this->allowedRouteNames, true)) {
            return $next($request);
        }

        if ($request->is('login')) {
            return $next($request);
        }

        // In Demo Mode: block mutating operations (POST, PUT, PATCH, DELETE) silently
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'demo',
            ], 200);
        }

        return back();
    }
}
