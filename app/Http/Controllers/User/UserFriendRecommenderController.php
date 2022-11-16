<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Recommender\RecommenderResource;
use App\Models\Friend;
use App\Models\Recommender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserFriendRecommenderController extends Controller
{
    public function store(Request $request, User $user, Friend $friend) {
        return DB::transaction(function () use ($request, $user, $friend) {
            $recommender = Recommender::create([
                'friend_id' => $friend->id,
                'user_id' => $user->id,
                'tipo' => $request->tipo,
            ]);

            $data = new RecommenderResource($recommender);
            return $data;
        });
    }
}
