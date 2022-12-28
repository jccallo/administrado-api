<?php

namespace App\Http\Requests\Postulation;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostulationCourseRequest extends FormRequest
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
            'tipo_curso' => ['required', 'string', Rule::in(Course::TIPO_CURSO)],
            'estado_curso' => ['required', 'string', Rule::in(Course::ESTADO_CURSO)],
            'fecha_curso' => 'required|date',
        ];
    }
}
