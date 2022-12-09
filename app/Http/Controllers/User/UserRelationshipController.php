<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\User\UpdateUserRelationshipRequest;
use App\Models\Friend;
use App\Models\User;

class UserRelationshipController extends ApiController
{
    public function index(User $user)
    {
        return $this->showAll($user->relationships);
    }

    public function update(UpdateUserRelationshipRequest $request, User $user, Friend $relationship)
    {
        $validated = $request->validated();
        $parentesco = $validated['parentesco'] ?? Friend::RELATIONSHIPS[0];
        $user->relationships()->attach($relationship->id, ['parentesco' => $parentesco]);
        return $this->showAll($user->relationships);
    }

    public function destroy(User $user, Friend $relationship)
    {
        if (!$user->relationships()->find($relationship->id)) {
            return $this->errorResponse('La persona especificada no tiene parentesco con el usuario', 404);
        }
        $user->relationships()->detach($relationship->id);
        return $this->showAll($user->relationships);
    }
}
