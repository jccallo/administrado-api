<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\ApiController;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends ApiController
{
    public function index()
    {
        $friends = Friend::orderByDesc('id')->get();
        return $this->showResponse(compact('friends'));
    }

    public function store(Request $request)
    {
        $friend = Friend::create($request->all());
        return $this->showResponse(compact('friend'), 201);

    }

    public function show(Friend $friend)
    {
        return  $this->showResponse(compact('friend'));
    }

    public function update(Request $request, Friend $friend)
    {
        $friend->update($request->all());
        return $this->showResponse(compact('friend'));
    }

    public function destroy(Friend $friend)
    {
        $friend->update(['status' => 0]);
        return $this->showResponse(compact('friend'));
    }
}
