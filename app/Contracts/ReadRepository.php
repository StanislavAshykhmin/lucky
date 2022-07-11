<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ReadRepository
{
    public function all(): ?Collection;

    public function one($id): ?Model;

    public function paginate($perPage = 10);

    public function getModel(): Model;

    public function count(): int;

}
