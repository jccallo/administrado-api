<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommender extends Model
{
    use HasFactory;

    protected $fillable = [
        'friend_id', // null
        'user_id', // null
        'tipo', // default
        'status', // default
    ];
}
