<?php

namespace App\Http\Requests\User;

use App\Models\Friend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserCallerRequest extends FormRequest
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
            'id' => ['required', 'integer', Rule::exists('friends', 'id')],
            'estado_respuesta' => ['required', 'string', Rule::in(Friend::ESTADO_RESPUESTA)],
        ];
    }
}
