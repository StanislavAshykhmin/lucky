<?php

namespace App\Models\Traits;

trait TimestampFormat
{
    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format(config('app.time_format'));
    }
    public function getCreatedAtTimestampAttribute()
    {
        return $this->created_at->timestamp;
    }

    public function getUpdateAtFormatAttribute()
    {
        return $this->updated_at->format(config('app.time_format'));
    }

    public function getUpdateAtTimestampAttribute()
    {
        return $this->updated_at->timestamp;
    }
}
