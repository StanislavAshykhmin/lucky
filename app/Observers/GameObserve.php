<?php

namespace App\Observers;

use App\Models\Game;

class GameObserve
{
    public function creating(Game $game)
    {
        $game->generateResult();
    }
}
