<?php

namespace App\Traits;

use ArrayObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

trait ApiResponser
{
    /**
     * @param Collection $data
     * @param int $code
     */
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    /**
     * @param string $message mensaje de error
     * @param int $code codigo de estado
     */
    protected function errorResponse($message, $code)
    {
        return response()->json([
            'message' => $message,
            'code' => $code
        ], $code);
    }

    /**
     * @param Object $response Collection object
     * @param Integer $code codigo de estado
     */
    protected function showAll($response, $code = 200)
    {
        $ok = collect();
        if ($response instanceof Collection) {
            $ok->put('data', $response);
        }
        return $this->successResponse($ok, $code);
    }

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
