<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 返回成功的JSON响应
     *
     * @param  mixed  $data
     * @param string $message
     * @return JsonResponse
     */
    public  function success(mixed $data, string $message = 'Success'): JsonResponse
    {
        return response()->json([
            'code' => 200,
            'data' => $data,
            'msg' => $message,
        ]);
    }

    /**
     * 返回错误的JSON响应
     *
     * @param string $message
     * @param mixed|null $data
     * @return JsonResponse
     */
    public  function error(string $message = 'Internal Server Error', mixed $data = null): JsonResponse
    {
        return response()->json([
            'code' => 500,
            'data' => $data,
            'msg' => $message,
        ]);
    }
}
