<?php

namespace App\Http\Controllers\Fault;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Fault\FaultRequest;
use App\Http\Resources\Fault\FaultResource;
use App\Models\Fault;

class FaultController extends ApiController
{
    public function index()
    {
        $faults = Fault::all();
        $data = FaultResource::collection($faults);
        return $data;
    }

    public function store(FaultRequest $request)
    {
        $fault = Fault::create($request->all());
        $data = new FaultResource($fault);
        return $data;

    }

    public function show(Fault $fault)
    {
        $data = new FaultResource($fault);
        return $data;
    }

    public function update(FaultRequest $request, Fault $fault)
    {
        $fault->update($request->all());
        $data = new FaultResource($fault);
        return $data;
    }

    public function destroy(Fault $fault)
    {
        $fault->delete();
        $data = new FaultResource($fault);
        return $data;
    }
}
