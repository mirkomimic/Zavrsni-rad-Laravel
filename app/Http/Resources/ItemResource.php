<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\RestaurantResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'restaurant' => new RestaurantResource($this->resource->restaurants),
        ];
    }
}
