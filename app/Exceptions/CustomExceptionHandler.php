<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class CustomExceptionHandler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if ($e instanceof AuthorizationException) {
            return response()->json(['error' => 1, 'mes' => __('Your account do not have access to this resource')], 200);
        }

        if ($e instanceof NotFoundHttpException) {
            return response()->json(['error' => 1, 'mes' => __('Endpoint not found')], 200);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json(['error' => 1, 'mes' => __('Object not found')], 200);
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return response()->json(['error' => 1, 'mes' => __('Invalid request method')], 200);
        }
        
        if ($e instanceof RouteNotFoundException) {
            return response()->json(['error' => 1, 'mes' =>'Route not found'], 200);
        }

        return parent::render($request, $e);
    }
}
