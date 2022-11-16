<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Recommender\RecommenderResource;
use App\Models\User;

class UserRecommenderController extends Controller
{
    public function index(User $user)
    {
        $recommenders = $user->recommenders;
        $data = RecommenderResource::collection($recommenders);
        return $data;
    }
}
