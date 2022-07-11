<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseWriteRepository implements \App\Contracts\WriteRepository
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): ?Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, Model $model): bool
    {
        return $model->update($attributes);
    }

    public function firstOrCreate(array $find, array $attributes): ?Model
    {
        return $this->model->firstOrCreate($find, $attributes);
    }

    public function updateOrCreate(array $find, array $attributes): ?Model
    {
        return $this->model->updateOrCreate($find, $attributes);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    public function restore(Model $model): bool
    {
        return $model->restore();
    }
}
