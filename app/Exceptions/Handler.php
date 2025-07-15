<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse; // Import JsonResponse

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        \Log::error('Data login', [
            'credentials' => $credentials,
            'user' => Auth::user(),
        ]);
        if ($request->expectsJson() || $request->is('api/*')) {
            if ($exception instanceof \Illuminate\Validation\ValidationException) {
                return new JsonResponse([
                    'message' => 'The given data was invalid.',
                    'errors' => $exception->errors(),
                ], 422);
            }

            if ($this->isHttpException($exception)) {
                return new JsonResponse([
                    'message' => $exception->getMessage() ?: 'An error occurred.',
                ], $exception->getStatusCode());
            }
            
            // Fallback for other exceptions
            return new JsonResponse([
                'message' => 'Server Error.',
                // 'error' => $exception->getMessage(), // Only include in development/debug
            ], 500);
        }

        return parent::render($request, $exception);
    }
}