<?php

namespace App\Exceptions;

use App\Traits\APIResponseTrait;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use APIResponseTrait;

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
     * @return void
     */
    public function register()
    {
        /*$this->reportable(function (Throwable $e) {
            //
        });*/
    }

    /**
     * @param Throwable $exception
     * @return void
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        ///dd($exception);
        parent::report($exception);
    }

    /**
     * @param $request
     * @param Throwable $exception
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof ValidationException){
            return $this->responseBadRequest($exception->validator->getMessageBag()->toArray());
        }

        return parent::render($request, $exception);
    }

}
