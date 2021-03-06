<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Services\Auth\AuthService;
use App\Traits\APIResponseTrait;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use APIResponseTrait;

    /**
     * @var AuthService
     */
    private $service;

    /**
     * @param AuthService $service
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @param LoginAuthRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function login(LoginAuthRequest $request): JsonResponse
    {
        $user = $this->service->login($request->all());
        if($user){
            return $this->responseSuccess([
                'user' => $user
            ]);
        }
        return $this->responseBadRequest();
    }

    /**
     * @param RegisterAuthRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function register(RegisterAuthRequest $request): JsonResponse
    {
        $user = $this->service->register($request->all());
        if ($user) {
            return $this->responseSuccess($user);
        }
        return $this->responseBadRequest();
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->service->logout();
        return $this->responseSuccess();
    }

    /**
     * @return JsonResponse
     */
    public function unauthorized(): JsonResponse
    {
        return $this->responseUnauthorized();
    }

    /**
     * @return JsonResponse
     */
    public function authorizedCheck(): JsonResponse
    {
        return $this->responseSuccess([
            'status' => $this->service->authorizedCheck()
        ]);
    }
}
