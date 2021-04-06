<?php

namespace App\Libs;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class Response
{
    public function __construct()
    {
        $this->request = new Request;
    }

    public function success_response($message, $data = Null, $status_code = 200)
    {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data,
            "status_code" => $status_code
        ], $status_code);
    }

    public function failed_response($message, $data = Null, $error_code = 400)
    {
        return response()->json([
            "success" => false,
            "message" => $message,
            "error_code" => $error_code,
            "data" => $data
        ], $error_code);
    }
}
