<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Relationship\RelationshipResource;
use App\Models\Friend;
use App\Models\Relationship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserFriendRelationshipController extends Controller
{
    public function store(Request $request, User $user, Friend $friend) {
        return DB::transaction(function () use ($request, $user, $friend) {
            $relationship = Relationship::create([
                'friend_id' => $friend->id,
                'user_id' => $user->id,
                'parentesco' => $request->parentesco,
            ]);

            $data = new RelationshipResource($relationship);
            return $data;
        });
    }
}
