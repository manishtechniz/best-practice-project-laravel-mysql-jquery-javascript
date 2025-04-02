<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\BasicRateLimiter;
use App\Http\Middleware\UserLoginAuto;
use App\Http\Middleware\LogIncomingRequest;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // alias middleware
        $middleware->alias([
            'basic-rate-limiter' => BasicRateLimiter::class,
        ]);

        // Add global middleware
        $middleware->append([
            UserLoginAuto::class,
            LogIncomingRequest::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
