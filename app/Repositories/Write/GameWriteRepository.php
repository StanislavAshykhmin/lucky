<?php

namespace App\Repositories\Write;

use App\Models\Game;
use App\Repositories\BaseWriteRepository;

final class GameWriteRepository extends BaseWriteRepository
{
    public function __construct(Game $game)
    {
        parent::__construct($game);
    }
}
