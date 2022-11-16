<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserFriendRelationshipRequest;
use App\Http\Resources\Relationship\RelationshipResource;
use App\Models\Friend;
use App\Models\Relationship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserFriendRelationshipController extends Controller
{
    public function store(StoreUserFriendRelationshipRequest $request, User $user, Friend $friend) {
        $validated = $request->validated();
        $parentesco = $validated['parentesco'] ?? Relationship::RELATIONSHIPS[0];
        return DB::transaction(function () use ($parentesco, $user, $friend) {
            $relationship = Relationship::create([
                'friend_id' => $friend->id,
                'user_id' => $user->id,
                'parentesco' => $parentesco,
            ]);

            $data = new RelationshipResource($relationship);
            return $data;
        });
    }
}
