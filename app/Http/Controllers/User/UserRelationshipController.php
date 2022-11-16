<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Relationship\RelationshipResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserRelationshipController extends Controller
{
    public function index(User $user)
    {
        $relationships = $user->relationships;
        $data = RelationshipResource::collection($relationships);
        return $data;
    }
}
