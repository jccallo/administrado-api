<?php

namespace App\Http\Controllers\Place;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Place\StorePlaceRequest;
use App\Http\Requests\Place\UpdatePlaceRequest;
use App\Http\Resources\Place\PlaceResource;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends ApiController
{
    public function index()
    {
        $places = Place::all();
        $data = PlaceResource::collection($places);
        return $data;
    }

    public function store(StorePlaceRequest $request)
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

    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $place->update($request->all());
        $data = new PlaceResource($place);
        return $data;
    }

    public function destroy(Place $place)
    {
        $place->delete();
        $data = new PlaceResource($place);
        return $data;
    }
}
