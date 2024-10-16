<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([ // if i want to customize the middleware this step is optional but the best practice is using alias
          "IsAdmin" => App\Http\Middleware\IsAdmin::class
        ]);



    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
