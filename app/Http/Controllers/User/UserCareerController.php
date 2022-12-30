<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Models\Career;
use App\Models\User;

class UserCareerController extends ApiController
{
    public function index(User $user)
    {
        return $this->showAll($user->careers);
    }

    public function update(User $user, Career $career)
    {
        $user->careers()->attach($career->id);
        return $this->showAll($user->careers);
    }

    public function destroy(User $user, Career $career)
    {
        if (!$user->careers()->find($career->id)) {
            return $this->errorResponse('La carrera especificado no esta asignado al usuario', 404);
        }
        $user->careers()->detach($career->id);
        return $this->showAll($user->careers);
    }
}
