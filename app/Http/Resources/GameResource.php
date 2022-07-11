<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Game */
class GameResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'value' => $this->value,
            'prize' => $this->prize,
            'win' => $this->win,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
