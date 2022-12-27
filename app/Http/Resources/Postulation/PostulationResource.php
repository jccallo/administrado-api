<?php

namespace App\Http\Resources\Postulation;

use Illuminate\Http\Resources\Json\JsonResource;

class PostulationResource extends JsonResource
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
            'estado_postulacion' => $this->estado_postulacion,
            'fecha_postulacion' => $this->created_at->format('Y-m-d'),
            'user_id' => $this->user_id,
            'vacancy_id' => $this->vacancy_id,
        ];
    }
}
