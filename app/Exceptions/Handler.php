<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            $modelo = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("Instancia de {$modelo} no encontrada", 403);
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse("URL no encontrada", 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse("Metodo de peticion no valido", 405);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->errorResponse('No posee permisos para ejecutar esta acción', 403);
        }

        if ($exception instanceof HttpException) {
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof QueryException) {
            $code = $exception->errorInfo[1];
            if ($code == 1451) {
                return $this->errorResponse('Imposible eliminar un registro que es llave foranea en otra tabla', 409);
            }
            if ($code == 1452) {
                return $this->errorResponse('Imposible agregar o actualizar un registro con llave foranea no existente', 409);
            }

            if ($code == 1062) {
                return $this->errorResponse('Imposible agregar o actualizar un registro con llave unica repetida', 409);
            }
        }

        // if (config('app.debug')) {
        //     return parent::render($request, $exception);
        // }
        return parent::render($request, $exception);
        return $this->errorResponse('Error inesperado', 500);
    }
}
