<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface WriteRepository
{
    public function create(array $attributes): ?Model;

    public function update(array $attributes, Model $model): bool;

    public function firstOrCreate(array $find, array $attributes): ?Model;

    public function updateOrCreate(array $find, array $attributes): ?Model;

    public function delete(Model $model): bool;

    public function restore(Model $model): bool;
}
