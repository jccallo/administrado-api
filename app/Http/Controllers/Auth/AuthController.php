<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function Login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->errorResponse('Las Credenciales son incorrectas.', 401);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        return $this->showMessage([
            'message' => 'Sesion iniciada Correctamente',
            'token' => $token,
        ]);
    }

    public function Logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->showMessage([
            'message' => 'Sesion cerrada correctamente',
        ]);
    }
}
