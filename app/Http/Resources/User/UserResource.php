<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name, // nunca es null
            'email' => $this->email,
            'password' => $this->password,
            'dni' => $this->dni,
            'telefono' => $this->telefono,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'talla_overol' => $this->talla_overol,
            'talla_zapato' => $this->talla_zapato,
            'talla' => $this->talla,
            'peso' => $this->peso,
            'direccion' => $this->direccion,
            'observacion' => $this->observacion,
            'sueldo_dia' => $this->sueldo_dia,
            'sueldo_mes' => $this->sueldo_mes,
            'foto_firma' => $this->foto_firma,
            'foto_perfil' => $this->foto_perfil,
            'foto_huella' => $this->foto_huella,
            'tipo_usuario' => $this->tipo_usuario, // nunca es null
            'status' => $this->status, // nunca es null
            'place' => $this->getPlaceName(),
            // 'relationships' => $this->getRelationships(),
            // 'recomenders' => $this->getRecommenders(),
        ];
    }
}
