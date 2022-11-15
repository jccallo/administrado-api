<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Place\PlaceResource;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends ApiController
{
    public function index()
    {
        $places = Place::orderByDesc('id')->get();
        $data = PlaceResource::collection($places);
        return $data;
    }

    public function store(Request $request)
    {
        $place = Place::create($request->all());
        $data = new PlaceResource($place);
        return $data;
    }

    public function show(Place $place)
    {
        $data = new PlaceResource($place);
        return $data;
    }

    public function update(Request $request, Place $place)
    {
        $place->update($request->all());
        $data = new PlaceResource($place);
        return $data;
    }

    public function destroy(Place $place)
    {
        $place->update(['status' => 'inactivo']);
        $data = new PlaceResource($place);
        return $data;
    }
}
