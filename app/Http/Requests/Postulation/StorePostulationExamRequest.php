<?php

namespace App\Http\Requests\Postulation;

use App\Models\Exam;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostulationExamRequest extends FormRequest
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
            'id' => ['required', 'integer', Rule::exists('exams', 'id')],
            'estado_examen' => ['required', 'string', Rule::in(Exam::ESTADO_EXAMEN)],
            'fecha_examen' => 'required|date',
        ];
    }
}
