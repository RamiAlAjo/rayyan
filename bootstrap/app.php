<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Only middleware safe for global usage
        // Do NOT append SetLocale globally because it depends on session middleware
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle exceptions here
    })
    ->create();
