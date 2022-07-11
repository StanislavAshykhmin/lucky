<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\User;
use App\Services\App\Write\GameWriteService;
use App\Services\Helpers\AjaxResponseNotification;
use Illuminate\Http\Request;

class GameController extends Controller
{
    protected GameWriteService $gameWriteService;
    public function __construct(GameWriteService $gameWriteService)
    {
        $this->gameWriteService = $gameWriteService;
    }

    public function store(User $user)
    {
        if ($game = $this->gameWriteService->create($user)){
            return AjaxResponseNotification::success('Result successfully received', ['game' => new GameResource($game)]);
        }
        return AjaxResponseNotification::error('Result not received');
    }
}
