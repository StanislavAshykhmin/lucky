<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Date;
use Webpatser\Uuid\Uuid;

trait LimitedAccess
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = self::newUuid();
            $model->access_expired_at = self::newTimestamp();
        });
    }

    public function makeNewAccess(): bool
    {
        return $this->forceFill([
            'uuid' => self::newUuid(),
            'access_expired_at' => self::newTimestamp(),
        ])->save();
    }
    public function resetAccess(): bool
    {
        return $this->forceFill([
            'access_expired_at' => null,
        ])->save();
    }

    public static function newUuid(): string
    {
        return Uuid::generate(4);
    }

    public static function newTimestamp(): \Illuminate\Support\Carbon
    {
        return Date::now()->addDays(7);
    }
}
