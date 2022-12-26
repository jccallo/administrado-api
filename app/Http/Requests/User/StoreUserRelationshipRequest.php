<?php

namespace App\Http\Requests\User;

use App\Models\Friend;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRelationshipRequest extends FormRequest
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
            'parentesco' => ['required', 'string', Rule::in(Friend::PARENTESCO)],
        ];
    }
}
