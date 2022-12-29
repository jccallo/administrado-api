<?php

namespace App\Http\Controllers\Career;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Career\CareerRequest;
use App\Http\Resources\Career\CareerResource;
use App\Models\Career;

class CareerController extends ApiController
{
    public function index()
    {
        $careers = Career::all();
        $data = CareerResource::collection($careers);
        return $data;
    }

    public function store(CareerRequest $request)
    {
        $career = Career::create($request->all());
        $data = new CareerResource($career);
        return $data;

    }

    public function show(Career $career)
    {
        $data = new CareerResource($career);
        return $data;
    }

    public function update(CareerRequest $request, Career $career)
    {
        $career->update($request->all());
        $data = new CareerResource($career);
        return $data;
    }

    public function destroy(Career $career)
    {
        $career->delete();
        $data = new CareerResource($career);
        return $data;
    }
}
