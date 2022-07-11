<?php

namespace App\Services\App\Write;

use App\Actions\Randomizer;
use App\Models\User;
use App\Repositories\Write\GameWriteRepository;

final class GameWriteService
{
    protected Randomizer $randomizer;
    protected GameWriteRepository $gameWriteRepository;
    public function __construct(Randomizer $randomizer, GameWriteRepository $gameWriteRepository)
    {
        $this->randomizer = $randomizer;
        $this->gameWriteRepository = $gameWriteRepository;
    }

    public function create(User $user): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->gameWriteRepository->create([
            'user_id' => $user->id,
            'value' => $this->randomizer->execute()
        ]);
    }
}
