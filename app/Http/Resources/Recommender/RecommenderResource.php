<?php

namespace App\Http\Resources\Recommender;

use Illuminate\Http\Resources\Json\JsonResource;

class RecommenderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'friend_id' => $this->friend_id,
            'user_id' => $this->user_id,
            'tipo' => $this->tipo,
            'status' => $this->status,
        ];
    }
}
