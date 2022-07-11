<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseReadRepository implements \App\Contracts\ReadRepository
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function all(): Collection
    {
        return $this->model->all();
    }

    public function one($id): ?Model
    {
        return $this->model->one($id);
    }

    public function paginate($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function count(): int
    {
        return $this->model->count();
    }
}
