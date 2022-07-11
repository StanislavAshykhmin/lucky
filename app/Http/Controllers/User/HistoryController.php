<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function latestGames(User $user)
    {
        return GameResource::collection($user->games()->latestLimit(3)->get());
    }
}
