<?php

namespace App\Http\Requests\Call;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StoreCallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $calls = DB::table('calls')
        //     ->where('friend_id', '=', $this->request->get('friend_id'))
        //     ->where('user_id', '=', $this->request->get('user_id'))
        //     ->count();
        // return $calls > 0 ? false : true;
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
            'estado_respuesta'=> 'sometimes|string',
            'status'=> 'sometimes|string',
            'friend_id'=> ['required', Rule::exists('friends', 'id')],
            'user_id'=> ['required', Rule::exists('users', 'id')],
        ];
    }
}
