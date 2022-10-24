<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Models\Place;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index()
    {
        $users = User::orderByDesc('id')->get();
        return $this->showAll($users);
    }

    public function create()
    {
        $places = Place::pluck('nombre', 'id');
        return var_dump([
            'ok' => true,
            'places' => $places,
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return $this->showOne($user);

    }

    public function show(User $user)
    {
        $places = Place::pluck('nombre', 'id');
        $familyNames = $user->friends()->pluck('nombre', 'id');
        // return var_dump(compact('places'));
        return $this->showResponse(compact('places', 'familyNames'));
        // return response()->json([
        //     'ok' => true,
        //     'user' => $user,
        //     'places' => $places,
        //     'familyNames' => $familyNames,
        // ], 200);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json([
            'ok' => true,
            'user' => $user,
        ], 200);
    }

    public function destroy(User $user)
    {
        $user->update(['state' => 0]);
        return response()->json([
            'ok' => true,
            'user' => $user,
        ], 200);
    }
}
