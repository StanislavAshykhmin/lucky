<?php

namespace App\Repositories\Read;

use App\Models\User;
use App\Repositories\BaseReadRepository;

final class UserReadRepository extends BaseReadRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
