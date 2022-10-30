<?php

namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\ApiController;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends ApiController
{
    public function index()
    {
        $vacancies = Vacancy::orderByDesc('id')->get();
        return $this->showResponse(compact('vacancies'));
    }

    public function store(Request $request)
    {
        $vacancy = Vacancy::create($request->all());
        return $this->showResponse(compact('vacancy'), 201);

    }

    public function show(Vacancy $vacancy)
    {
        return  $this->showResponse(compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $vacancy->update($request->all());
        return $this->showResponse(compact('vacancy'));
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->update(['status' => 0]);
        return $this->showResponse(compact('vacancy'));
    }
}
