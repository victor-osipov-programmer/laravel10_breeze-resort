<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->wrap('list');
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc_data' => $this->desc_data,
        ];
    }
}
