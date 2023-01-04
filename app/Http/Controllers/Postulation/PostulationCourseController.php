<?php

namespace App\Http\Controllers\Postulation;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Postulation\StorePostulationCourseRequest;
use App\Http\Requests\Postulation\UpdatePostulationCourseRequest;
use App\Models\Course;
use App\Models\Postulation;

class PostulationCourseController extends ApiController
{
    public function index(Postulation $postulation)
    {
        return $this->showAll($postulation->courses);
    }

    public function show(Postulation $postulation, Course $course) {
        return $this->showOne($postulation->courses()->find($course->id)->pivot);
    }

    public function store(StorePostulationCourseRequest $request, Postulation $postulation)
    {
        $validated = $request->validated();
        $postulation->courses()->attach($validated['id'], [
            'tipo_curso' => $validated['tipo_curso'],
            'estado_curso' => $validated['estado_curso'],
            'fecha_curso' => $validated['fecha_curso'],
        ]);
        return $this->showAll($postulation->courses);
    }

    public function update(UpdatePostulationCourseRequest $request, Postulation $postulation, Course $course)
    {
        if (!$postulation->courses()->find($course->id)) {
            return $this->errorResponse('El curso especificado no esta asignado a la postulacion', 404);
        }
        $validated = $request->validated();
        $postulation->courses()->updateExistingPivot($course->id, [
            'tipo_curso' => $validated['tipo_curso'],
            'estado_curso' => $validated['estado_curso'],
            'fecha_curso' => $validated['fecha_curso'],
        ]);
        return $this->showAll($postulation->courses);
    }

    public function destroy(Postulation $postulation, Course $course)
    {
        if (!$postulation->courses()->find($course->id)) {
            return $this->errorResponse('El curso especificado no esta asignado a la postulacion', 404);
        }
        $postulation->courses()->detach($course->id);
        return $this->showAll($postulation->courses);
    }
}
