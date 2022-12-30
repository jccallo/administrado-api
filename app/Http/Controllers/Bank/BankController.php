<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Bank\BankRequest;
use App\Http\Resources\Bank\BankResource;
use App\Models\Bank;

class BankController extends ApiController
{
    public function index()
    {
        $banks = Bank::all();
        $data = BankResource::collection($banks);
        return $data;
    }

    public function store(BankRequest $request)
    {
        $bank = Bank::create($request->all());
        $data = new BankResource($bank);
        return $data;

    }

    public function show(Bank $bank)
    {
        $data = new BankResource($bank);
        return $data;
    }

    public function update(BankRequest $request, Bank $bank)
    {
        $bank->update($request->all());
        $data = new BankResource($bank);
        return $data;
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        $data = new BankResource($bank);
        return $data;
    }
}
