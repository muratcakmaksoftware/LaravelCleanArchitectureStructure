<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Yajra\DataTables\Facades\DataTables;

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
        $model = $this->getById($id); //for observe event
        return $model->update($attributes);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $model = $this->getById($id, ['id']); //for observe event
        return $model->delete();
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function restore($id): ?bool
    {
        $model = $this->getById($id, ['id'], true); //for observe event
        return $model->restore();
    }

    /**
     * @param $id
     * @param array $columns
     * @param bool $onlyTrashed
     * @return Model
     */
    public function getById($id, array $columns = ['*'], bool $onlyTrashed = false): Model
    {
        $this->model = $onlyTrashed ? $this->model->onlyTrashed() : $this->model;
        return $this->model->select($columns)->where('id', $id)->firstOrFail();
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = ['*']): Collection
    {
        return $this->model->all($columns);
    }

    /**
     * @param array $columns
     * @param bool $onlyTrashed
     * @return JsonResponse
     */
    public function defaultDatatables(array $columns = ['*']): JsonResponse
    {
        $query = $this->model->select($columns);
        return DataTables::eloquent($query)->toJson();
    }

    /**
     * @param array $columns
     * @return JsonResponse
     */
    public function defaultTrashedDatatables(array $columns = ['*']): JsonResponse
    {
        $query = $this->model->onlyTrashed()->select($columns);
        return DataTables::eloquent($query)->toJson();
    }
}
