<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\User\UpdateUserRecommenderRequest;
use App\Http\Resources\Friend\FriendResource;
use App\Models\Friend;
use App\Models\User;

class UserRecommenderController extends ApiController
{
    public function index(User $user)
    {
        return $this->showAll($user->recommenders);
    }

    public function update(UpdateUserRecommenderRequest $request, User $user, Friend $recommender)
    {
        $validated = $request->validated();
        $tipo = $validated['tipo'] ?? Friend::TIPOS[0];
        $user->recommenders()->attach($recommender->id, ['tipo' => $tipo]);
        return $this->showAll($user->recommenders);
    }

    public function destroy(User $user, Friend $recommender)
    {
        if (!$user->recommenders()->find($recommender->id)) {
            return $this->errorResponse('La persona especificada no tiene recomendacion para el usuario', 404);
        }
        $user->recommenders()->detach($recommender->id);
        return $this->showAll($user->recommenders);
    }
}
