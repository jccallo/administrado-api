<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\User\UserFaultRequest;
use App\Models\Fault;
use App\Models\User;

class UserFaultController extends ApiController
{
    public function index(User $user)
    {
        return $this->showAll($user->faults);
    }

    public function store(UserFaultRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->faults()->attach($validated['id'], [
            'fecha_falta' => $validated['fecha_falta'],
            'place_id' => $validated['place_id'] ?? null,
        ]);
        return $this->showAll($user->faults);
    }

    public function destroy(User $user, Fault $fault)
    {
        if (!$user->faults()->find($fault->id)) {
            return $this->errorResponse('La falta especificada no esta asignada al usuario', 404);
        }
        $user->faults()->detach($fault->id);
        return $this->showAll($user->faults);
    }
}
