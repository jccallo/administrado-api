<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => ['sometimes', 'nullable', 'email', Rule::unique('users', 'email')->ignore($this->user->id, 'id')],
            'password' => ['sometimes', 'nullable', 'string', Password::defaults()],
            'dni' => ['sometimes', 'nullable', 'string', Rule::unique('users', 'dni')->ignore($this->user->id, 'id')],
            'telefono' => ['sometimes', 'nullable', 'string', Rule::unique('users', 'telefono')->ignore($this->user->id, 'id')],
            'fecha_nacimiento' => 'sometimes|nullable|date|date_format:Y-m-d',
            'talla_overol' => 'sometimes|nullable|string',
            'talla_zapato' => 'sometimes|nullable|integer',
            'talla' => 'sometimes|nullable|numeric',
            'peso' => 'sometimes|nullable|numeric',
            'direccion' => 'sometimes|nullable|string',
            'observacion' => 'sometimes|nullable|string',
            'sueldo_dia' => 'sometimes|nullable|numeric',
            'sueldo_mes' => 'sometimes|nullable|numeric',
            'foto_firma' => 'sometimes|nullable|string',
            'foto_perfil' => 'sometimes|nullable|string',
            'foto_huella' => 'sometimes|nullable|string',
            'tipo_usuario' => ['sometimes', 'nullable', 'string', Rule::in(User::TIPO_USUARIO)],
            'status' => ['sometimes', 'nullable', 'string', Rule::in(['activo', 'inactivo'])],
            'place_id' => ['sometimes', 'nullable', 'integer', Rule::exists('places', 'id')],
        ];
    }
}
