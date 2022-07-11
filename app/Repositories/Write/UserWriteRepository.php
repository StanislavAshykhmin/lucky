<?php

namespace App\Repositories\Write;

use App\Models\User;
use App\Repositories\BaseWriteRepository;

final class UserWriteRepository extends BaseWriteRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
