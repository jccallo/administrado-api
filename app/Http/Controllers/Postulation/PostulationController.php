<?php

namespace App\Http\Controllers\Postulation;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Postulation\PostulationRequest;
use App\Http\Resources\Postulation\PostulationResource;
use App\Models\Postulation;

class PostulationController extends ApiController
{
    public function index()
    {
        $postulations = Postulation::all();
        $data = PostulationResource::collection($postulations);
        return $data;
    }

    public function store(PostulationRequest $request)
    {
        $postulation = Postulation::create($request->all());
        $data = new PostulationResource($postulation);
        return $data;
    }

    public function show(Postulation $postulation)
    {
        $data = new PostulationResource($postulation);
        return $data;
    }

    public function update(PostulationRequest $request, Postulation $postulation)
    {
        $postulation->update($request->all());
        $data = new PostulationResource($postulation);
        return $data;
    }

    public function destroy(Postulation $postulation)
    {
        $postulation->delete();
        $data = new PostulationResource($postulation);
        return $data;
    }
}
