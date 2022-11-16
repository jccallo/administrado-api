<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserFriendRecommenderRequest;
use App\Http\Resources\Recommender\RecommenderResource;
use App\Models\Friend;
use App\Models\Recommender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserFriendRecommenderController extends Controller
{
    public function store(StoreUserFriendRecommenderRequest $request, User $user, Friend $friend) {
        $validated = $request->validated();
        $email = $validated['tipo'] ?? Recommender::TIPO[0];
        return DB::transaction(function () use ($email, $user, $friend) {
            $recommender = Recommender::create([
                'friend_id' => $friend->id,
                'user_id' => $user->id,
                'tipo' => $email,
            ]);

            $data = new RecommenderResource($recommender);
            return $data;
        });
    }
}
