<?php

namespace App\Dtos\Admin;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class UserFormDto extends Data
{
    public function __construct(
        public string $name,
        public int $phone,
    ) {
    }
}
