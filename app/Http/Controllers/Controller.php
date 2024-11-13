<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    // Any shared functionality for your controllers can go here

    // Example of a helper function
    protected function responseSuccess($data, $message = 'Success', $code = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    protected function responseError($message, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
