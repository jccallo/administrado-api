<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Resources\User\UserResource;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index()
    {
        $data = User::orderByDesc('id')->get();
        return UserResource::collection($data);
    }

    public function store(Request $request)
    {
        $user = $request->except(['family']); // datos de usuario
        $relationships = $request->get('relationships'); // familia
        $recommenders = $request->get('recommenders'); // recomendados

        $user = User::create($user);
        $user->relationships()->sync($relationships);
        $user->recommenders()->sync($recommenders);

        $data = new UserResource($user);
        return $data;

    }

    public function show(User $user)
    {
        $data = new UserResource($user);
        return $data;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $data = new UserResource($user);
        return $data;
    }

    public function destroy(User $user)
    {
        $user->update(['status' => 'inactivo']);
        $data = new UserResource($user);
        return $data;
    }
}
