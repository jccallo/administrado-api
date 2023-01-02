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
        $validated = $request->validated();
        $postulation = Postulation::create($validated);
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
        $validated = $request->validated();
        $postulation->update($validated);
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
