<?php

namespace App\Repositories\Users\User;

use App\Interfaces\RepositoryInterfaces\Users\User\UserRepositoryInterface;
use App\Models\Users\User\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
