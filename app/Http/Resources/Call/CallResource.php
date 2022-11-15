<?php

namespace App\Http\Resources\Call;

use Illuminate\Http\Resources\Json\JsonResource;

class CallResource extends JsonResource
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
            'estado_respuesta' => $this->estado_respuesta,
            'status' => $this->status,
            'friend_id' => $this->friend->nombre,
            'user_id' => $this->user->name,
        ];
    }
}
