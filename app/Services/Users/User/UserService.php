<?php

namespace App\Services\Users\User;

use App\Http\Controllers\Controller;
use App\Interfaces\RepositoryInterfaces\Users\User\UserRepositoryInterface;
use App\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{

    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {

    }

    public function create()
    {
        //
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes)
    {
        $attributes['password'] = Hash::make($attributes['password']);
        return $this->repository->store($attributes);
    }

    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return array
     */
    public function edit($id): array
    {
        return [
            'user' => $this->repository->getById($id)
        ];
    }

    public function update(array $attributes, $id)
    {
        if(isset($attributes['password'])){
            $attributes['password'] = Hash::make($attributes['password']);
        }

        return $this->repository->update($attributes, $id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        return $this->repository->destroy($id);
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function restore($id): ?bool
    {
        return $this->repository->restore($id);
    }

    /**
     * @param array $columns
     * @return array
     */
    public function defaultDatatables(array $columns = ['*']): array
    {
        return [
            'datatables' => $this->repository->defaultDatatables($columns)
        ];
    }

    /**
     * @param array $columns
     * @return array
     */
    public function trashedDatatables(array $columns = ['*']): array
    {
        return [
            'datatables' => $this->repository->defaultTrashedDatatables($columns)
        ];
    }
}
