<?php

namespace App\Models;

use App\Models\Traits\TimestampFormat;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use TimestampFormat;
    protected $fillable = ['value', 'prize', 'win', 'user_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function generateResult()
    {
        $this->win = $this->value % 2 === 0;
        if($this->win){
            if ($this->value > 900){
                $this->prize = $this->getPercentageOfValue(70);
            }elseif ($this->value > 600){
                $this->prize = $this->getPercentageOfValue(50);
            }elseif ($this->value > 300){
                $this->prize = $this->getPercentageOfValue(30);
            }else{
                $this->prize = $this->getPercentageOfValue(10);
            }
        }else{
            $this->prize = 0;
        }
    }

    public function getPercentageOfValue(int $percent): float|int
    {
        return round($percent * $this->value / 100, 2);
    }

    public function scopeLatestLimit($query, $limit)
    {
        return $query->latest()->limit($limit);
    }

    public function getIsActiveHtmlAttribute(): string
    {
        return $this->win ? '<span class="badge bg-success">Win</span>' : '<span class="badge bg-danger">Lose</span>';
    }
}
