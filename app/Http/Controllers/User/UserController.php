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
        $users = User::all();
        $data = UserResource::collection($users);
        return $data;
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $data = new UserResource($user);
        return $data;
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
        $user->delete();
        $data = new UserResource($user);
        return $data;
    }
}
