<?php

namespace App\Services\Users\User;

use App\Http\Controllers\Controller;
use App\Interfaces\RepositoryInterfaces\Users\User\UserRepositoryInterface;
use App\Services\BaseService;
use Illuminate\Http\Request;

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
        return $this->repository->store($attributes);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
