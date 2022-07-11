<?php

namespace App\Actions;

class Randomizer
{
    public function execute(): int
    {
        return rand(1, 1000);
    }
}
