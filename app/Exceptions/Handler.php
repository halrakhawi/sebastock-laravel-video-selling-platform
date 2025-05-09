<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
    
//     public function render($request, Exception $exception)
// {
//     if ($this->isHttpException($exception)) {
//         if ($exception->getStatusCode() == 404) {
//             return response()->view('errors.' . '404', [], 404);
//         }
//         if ($exception->getStatusCode() == 1062) {
//             return response()->view('front.error500', [], 1062);
//         }
//     }
//     return parent::render($request, $exception);
// }
}
