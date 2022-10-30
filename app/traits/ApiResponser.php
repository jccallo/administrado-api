<?php

namespace App\Traits;

use ArrayObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    /**
     * @param Array $response datos
     * @param Integer $code codigo de estado
     */
    protected function showResponse($response, $code = 200)
    {
        $ok = collect(['ok' => true]);
        if (isset($response) && is_array($response)) {
            $ok = $ok->union($response);
        }
        return $this->successResponse($ok, $code);
    }

    // protected function errorResponse($message, $code)
    // {
    //     return response()->json([
    //         'ok' => false,
    //         'error' => $message,
    //         'code' => $code
    //     ], $code);
    // }

    // /**
    //  * @param Object $response LengthAwarePaginator or Collection object
    //  * @param Array $meta datos adicionales
    //  * @param Integer $code codigo de estado
    //  */
    // protected function showAll($response, $meta = null, $code = 200)
    // {
    //     $ok = collect(['ok' => true]);
    //     if ($response instanceof LengthAwarePaginator) {
    //         $ok = $ok->merge($response);
    //     }
    //     if ($response instanceof Collection) {
    //         $ok->put('data', $response);
    //     }
    //     if (isset($meta) && is_array($meta)) {
    //         $ok = $ok->union($meta);
    //     }
    //     return $this->successResponse($ok, $code);
    // }

    // protected function showOne(Model $instance, $meta = null, $code = 200)
    // {
    //     $ok = collect(['ok' => true]);
    //     $ok->put('data', $instance);
    //     if (isset($meta) && is_array($meta)) {
    //         $ok = $ok->union($meta);
    //     }
    //     return $this->successResponse($ok, $code);
    // }

}
