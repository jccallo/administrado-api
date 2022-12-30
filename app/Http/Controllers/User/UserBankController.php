<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\User\UserBankRequest;
use App\Models\Bank;
use App\Models\User;

class UserBankController extends ApiController
{
    public function index(User $user)
    {
        return $this->showAll($user->accounts);
    }

    public function update(UserBankRequest $request, User $user, Bank $bank)
    {
        $validated = $request->validated();
        $user->accounts()->attach($bank->id, [
            'numero_cuenta' => $validated['numero_cuenta'],
            'numero_cuenta_interbancario' => $validated['numero_cuenta_interbancario'] ?? null,
        ]);
        return $this->showAll($user->accounts);
    }

    public function destroy(User $user, Bank $bank)
    {
        if (!$user->accounts()->find($bank->id)) {
            return $this->errorResponse('La banco especificado no esta asignado al usuario', 404);
        }
        $user->accounts()->detach($bank->id);
        return $this->showAll($user->accounts);
    }
}

