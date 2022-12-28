<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseRequest;
use App\Http\Resources\Course\CourseResource;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $data = CourseResource::collection($courses);
        return $data;
    }

    public function store(CourseRequest $request)
    {
        $course = Course::create($request->all());
        $data = new CourseResource($course);
        return $data;

    }

    public function show(Course $course)
    {
        $data = new CourseResource($course);
        return $data;
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->all());
        $data = new CourseResource($course);
        return $data;
    }

    public function destroy(Course $course)
    {
        $course->delete();
        $data = new CourseResource($course);
        return $data;
    }
}
