<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Film extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'release_date' => $this->release_date,
            'rating' => $this->rating,
            'ticket_price' => $this->ticket_price,
            'country' => $this->country,
            'photo' => $this->photo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
