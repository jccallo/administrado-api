<?php

namespace App\Http\Controllers\Postulation;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Postulation\StorePostulationExamRequest;
use App\Http\Requests\Postulation\UpdatePostulationExamRequest;
use App\Models\Exam;
use App\Models\Postulation;

class PostulationExamController extends ApiController
{
    public function index(Postulation $postulation)
    {
        return $this->showAll($postulation->exams);
    }

    public function show(Postulation $postulation, Exam $exam) {
        return $this->showOne($postulation->exams()->find($exam->id)->pivot);
    }

    public function store(StorePostulationExamRequest $request, Postulation $postulation)
    {
        $validated = $request->validated();
        $postulation->exams()->attach($validated['id'], [
            'estado_examen' => $validated['estado_examen'],
            'fecha_examen' => $validated['fecha_examen'],
        ]);
        return $this->showAll($postulation->exams);
    }

    public function update(UpdatePostulationExamRequest $request, Postulation $postulation, Exam $exam)
    {
        if (!$postulation->exams()->find($exam->id)) {
            return $this->errorResponse('El examen especificado no esta asignado al usuario', 404);
        }
        $validated = $request->validated();
        $postulation->exams()->updateExistingPivot($exam->id, [
            'estado_examen' => $validated['estado_examen'],
            'fecha_examen' => $validated['fecha_examen'],
        ]);
        return $this->showAll($postulation->exams);
    }

    public function destroy(Postulation $postulation, Exam $exam)
    {
        if (!$postulation->exams()->find($exam->id)) {
            return $this->errorResponse('El examen especificado no esta asignado al usuario', 404);
        }
        $postulation->exams()->detach($exam->id);
        return $this->showAll($postulation->exams);
    }
}
