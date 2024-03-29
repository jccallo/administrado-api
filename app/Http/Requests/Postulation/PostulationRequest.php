<?php

namespace App\Http\Requests\Postulation;

use App\Models\Postulation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostulationRequest extends FormRequest
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
            'estado_postulacion' => ['required', 'string', Rule::in(Postulation::ESTADO_POSTULACION)],
            'user_id' => ['required', 'integer', Rule::exists('postulations', 'id')],
            'vacancy_id' => ['required', 'integer', Rule::exists('vacancies', 'id')],
        ];
    }
}
