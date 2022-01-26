<?php

namespace App\Exceptions;

use App\Enums\Languages\General\GeneralLanguageFile;
use App\Traits\APIResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
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
     * @param Throwable $e
     * @return void
     * @throws Throwable
     */
    public function report(Throwable $e)
    {
        parent::report($e);
    }

    /**
     * @param $request
     * @param Throwable $e
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if($e instanceof ValidationException){
            return $this->responseBadRequest($e->validator->getMessageBag()->toArray());
        }

        if($e instanceof ModelNotFoundException){
            return $this->responseInternalServerError(null, translation(GeneralLanguageFile::EXCEPTION, 'ModelNotFoundException', ['model' => Str::afterLast($e->getModel(), '\\')]));
        }

        return parent::render($request, $e);
    }

}
