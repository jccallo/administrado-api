<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Call extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'estado_respuesta',
        'status',
        'friend_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function friend()
    {
        return $this->belongsTo(Friend::class, 'friend_id', 'id');
    }

    /**
     * verficar si existe la llave unica compuesta
     */
    public static function isUniqueComposite(Request $request)
    {
        $calls = DB::table('calls')
            ->where('friend_id', '=', $request->friend_id)
            ->where('user_id', '=', $request->user_id)
            ->count();
        return $calls; // $calls >= 0
    }
}
