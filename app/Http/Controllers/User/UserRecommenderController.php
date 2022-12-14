<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\User\StoreUserRecommenderRequest;
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

    public function store(StoreUserRecommenderRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->recommenders()->attach($validated['id'], ['tipo' => $validated['tipo']]);
        return $this->showAll($user->recommenders);
    }

    public function update(UpdateUserRecommenderRequest $request, User $user, Friend $recommender)
    {
        $validated = $request->validated();
        $user->recommenders()->updateExistingPivot($recommender->id, ['tipo' => $validated['tipo']]);
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
