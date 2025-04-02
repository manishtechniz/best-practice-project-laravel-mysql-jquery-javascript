<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter;

class BasicRateLimiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $executed = RateLimiter::attempt(
            'apply-ratelimit:'. $request->ip(),
            $perSecond = 1,
            function() use ($next, $request) {
            },
            $decayRate = 1,
        );

        if (! $executed) {
            return redirect()->route('expire-rate-limit');
        }

        return $next($request);
    }
}
