<?php

namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Vacancy\VacancyResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends ApiController
{
    public function index()
    {
        $vacancies = Vacancy::orderByDesc('id')->get();
        $data = VacancyResource::collection($vacancies);
        return $data;
    }

    public function store(Request $request)
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

    public function update(Request $request, Vacancy $vacancy)
    {
        $vacancy->update($request->all());
        $data = new VacancyResource($vacancy);
        return $data;
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->update(['status' => 'inactivo']);
        $data = new VacancyResource($vacancy);
        return $data;
    }
}
