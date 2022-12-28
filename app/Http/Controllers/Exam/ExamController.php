<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Exam\ExamRequest;
use App\Http\Resources\Exam\ExamResource;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends ApiController
{
    public function index()
    {
        $exams = Exam::all();
        $data = ExamResource::collection($exams);
        return $data;
    }

    public function store(ExamRequest $request)
    {
        $exam = Exam::create($request->all());
        $data = new ExamResource($exam);
        return $data;

    }

    public function show(Exam $exam)
    {
        $data = new ExamResource($exam);
        return $data;
    }

    public function update(ExamRequest $request, Exam $exam)
    {
        $exam->update($request->all());
        $data = new ExamResource($exam);
        return $data;
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        $data = new ExamResource($exam);
        return $data;
    }
}
