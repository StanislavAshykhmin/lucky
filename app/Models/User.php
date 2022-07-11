<?php

namespace App\Models;

use App\Models\Traits\TimestampFormat;
use App\Models\Traits\LimitedAccess;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, LimitedAccess, TimestampFormat;

    protected $appends = ['expired_access_format'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'uuid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'access_expired_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return Hash::make($this->phone);
    }

    public function validateAccessDate()
    {
        return !$this->access_expired_at || now()->isAfter($this->access_expired_at);
    }

    public function getExpiredAccessFormatAttribute()
    {
        return $this->access_expired_at?->format('Y-m-d H:i:s');
    }

    public function games(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function getIsActiveHtmlAttribute(): string
    {
        return $this->validateAccessDate() ? '<span class="badge bg-danger">Disabled</span>' : '<span class="badge bg-success">Active</span>';
    }
}
