<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class UserController extends ApiController
{
    public function index()
    {
        $users = User::orderByDesc('id')->get();
        $data = UserResource::collection($users);
        return $data;
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $data = new UserResource($user);
        return $data;

        // $user = $request->except(['relationships', 'recommenders']); // datos de usuario
        // $relationships = $request->get('relationships'); // parentesco
        // $recommenders = $request->get('recommenders'); // recomendados
        // $user->relationships()->sync($relationships);
        // $user->recommenders()->sync($recommenders);
    }

    public function show(User $user)
    {
        $data = new UserResource($user);
        return $data;
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
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
