<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\User\StoreUserCallerRequest;
use App\Http\Requests\User\UpdateUserCallerRequest;
use App\Models\Friend;
use App\Models\User;

class UserCallerController extends ApiController
{
    public function index(User $user)
    {
        return $this->showAll($user->callers);
    }

    public function store(StoreUserCallerRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->callers()->attach($validated['id'], ['estado_respuesta' => $validated['estado_respuesta']]);
        return $this->showAll($user->callers);
    }

    public function update(UpdateUserCallerRequest $request, User $user, Friend $caller)
    {
        if (!$user->callers()->find($caller->id)) {
            return $this->errorResponse('La persona especificada no tiene respuesta para el usuario', 404);
        }
        $validated = $request->validated();
        $user->callers()->updateExistingPivot($caller->id, ['estado_respuesta' => $validated['estado_respuesta']]);
        return $this->showAll($user->callers);
    }

    public function destroy(User $user, Friend $caller)
    {
        if (!$user->callers()->find($caller->id)) {
            return $this->errorResponse('La persona especificada no tiene respuesta para el usuario', 404);
        }
        $user->callers()->detach($caller->id);
        return $this->showAll($user->callers);
    }
}
