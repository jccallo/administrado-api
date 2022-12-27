<?php

namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Vacancy\VacancyRequest;
use App\Http\Resources\Vacancy\VacancyResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends ApiController
{
    public function index()
    {
        $vacancies = Vacancy::all();
        $data = VacancyResource::collection($vacancies);
        return $data;
    }

    public function store(VacancyRequest $request)
    {
        $vacancy = Vacancy::create($request->all());
        $data = new VacancyResource($vacancy);
        return $data;

    }

    public function show(Vacancy $vacancy)
    {
        $data = new VacancyResource($vacancy);
        return $data;
    }

    public function update(VacancyRequest $request, Vacancy $vacancy)
    {
        $vacancy->update($request->all());
        $data = new VacancyResource($vacancy);
        return $data;
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        $data = new VacancyResource($vacancy);
        return $data;
    }
}
