<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Friend\StoreFriendRequest;
use App\Http\Requests\Friend\UpdateFriendRequest;
use App\Http\Resources\Friend\FriendResource;
use App\Models\Friend;

class FriendController extends ApiController
{
    public function index()
    {
        $friends = Friend::all();
        $data = FriendResource::collection($friends);
        return $data;
    }

    public function store(StoreFriendRequest $request)
    {
        $validated = $request->validated();
        $friend = Friend::create($validated);
        $data = new FriendResource($friend);
        return $data;
    }

    public function show(Friend $friend)
    {
        $data = new FriendResource($friend);
        return $data;
    }

    public function update(UpdateFriendRequest $request, Friend $friend)
    {
        $validated = $request->validated();
        $friend->update($validated);
        $data = new FriendResource($friend);
        return $data;
    }

    public function destroy(Friend $friend)
    {
        $friend->delete();
        $data = new FriendResource($friend);
        return $data;
    }
}
