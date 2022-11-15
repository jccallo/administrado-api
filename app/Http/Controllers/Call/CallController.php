<?php

namespace App\Http\Controllers\Call;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Call\StoreCallRequest;
use App\Http\Resources\Call\CallResource;
use App\Models\Call;

class CallController extends ApiController
{
    public function index()
    {
        $calls = Call::orderByDesc('id')->get();
        $data = CallResource::collection($calls);
        return $data;
    }

    public function store(StoreCallRequest $request)
    {
        $validated = $request->validated();
        $call = Call::create($validated);
        $data = new CallResource($call);
        return $data;
    }

    public function update(StoreCallRequest $request, Call $call)
    {
        $validated = $request->validated();
        $call->update($validated);
        $data = new CallResource($call);
        return $data;
    }

    public function destroy(Call $call)
    {
        $call->update(['status' => 'inactivo']);
        $data = new CallResource($call);
        return $data;
    }
}
