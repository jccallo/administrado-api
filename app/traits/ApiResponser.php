<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser
{
  private function successResponse($data, $code)
  {
    return response()->json($data, $code);
  }

  protected function errorResponse($message, $code)
  {
    return response()->json([
      'ok' => false,
      'error' => $message,
      'code' => $code
    ], $code);
  }

  protected function showAll(Collection $response, $code = 200)
  {
    $newCollection = collect(['ok' => true]);
    $newCollection->put('data', $response);
    return $this->successResponse($newCollection, $code);
  }

  protected function showOne(Model $instance, $code = 200)
  {
    $newCollection = collect(['ok' => true]);
    $newCollection->put('data', $instance);
    return $this->successResponse($newCollection, $code);
  }

  protected function showResponse($response, $code = 200)
  {
    $ok = collect(['ok' => true]);
    // $collection =  collect($response);
    // $collection->each(function ($item) {

    // });
    // $union = $ok->union($response);
    // $union->put('data', $union);
    // return $this->successResponse($union, $code);
    return var_dump($response);
  }
}
