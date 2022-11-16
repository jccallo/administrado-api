<?php

namespace App\Http\Requests\User;

use App\Models\Relationship;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserFriendRelationshipRequest extends FormRequest
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
            'parentesco' => ['sometimes', 'string', Rule::in(Relationship::RELATIONSHIPS)],
        ];
    }
}
