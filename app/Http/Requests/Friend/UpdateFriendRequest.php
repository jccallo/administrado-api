<?php

namespace App\Http\Requests\Friend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFriendRequest extends FormRequest
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
            'nombre' => 'required|string',
            'telefono' => ['sometimes', 'nullable', 'string', Rule::unique('friends', 'telefono')->ignore($this->friend->id, 'id')],
            'direccion' => 'sometimes|nullable|string',
            'correo' => ['sometimes', 'nullable', 'email', Rule::unique('friends', 'correo')->ignore($this->friend->id, 'id')],
        ];
    }
}
