<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function store(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @param $id
     * @return bool
     */
    public function update(array $attributes, $id): bool
    {
        $model = $this->getById($id);
        return $model->update($attributes);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $model = $this->getById($id, ['id']);
        return $model->delete();
    }

    /**
     * @param $id
     * @param array $columns
     * @return Model
     */
    public function getById($id, array $columns = ['*']): Model
    {
        return $this->model->select($columns)->where('id', $id)->firstOrFail();
    }

    /**
     * @param $id
     * @return null|Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }
}
