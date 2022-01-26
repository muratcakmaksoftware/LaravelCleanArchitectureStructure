<?php

namespace App\Interfaces\RepositoryInterfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function store(array $attributes): Model;

    /**
     * @param array $attributes
     * @param $id
     * @return bool
     */
    public function update(array $attributes, $id): bool;

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id): bool;

    /**
     * @param $id
     * @param array $columns
     * @return Model
     */
    public function getById($id, array $columns = ['*']): Model;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model;
}

/**
 * Author: Murat Çakmak
 */
