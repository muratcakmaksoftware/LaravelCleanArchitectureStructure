<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\User\StoreUserRequest;
use App\Http\Requests\Users\User\UpdateUserRequest;
use App\Services\Users\User\UserService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use APIResponseTrait;

    /**
     * @var UserService
     */
    private $service;

    /**
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('testindex');
    }

    /**
     * @param StoreUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = $this->service->store($request->all());
        if(isset($user)){
            return $this->responseStore();
        }
        return $this->responseBadRequest();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return $this->responseSuccess($this->service->edit($id));
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, $id): JsonResponse
    {
        if($this->service->update($request->all(), $id)){
            return $this->responseUpdate();
        }
        return $this->responseBadRequest();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        if($this->service->destroy($id)){
            return $this->responseDestroy();
        }
        return $this->responseBadRequest();
    }
}
