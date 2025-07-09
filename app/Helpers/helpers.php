<?php

namespace App\Helpers;

class Helpers 
{

    /**
     * Send API Response Helper Function
     */
    public static function sendResponse($code = 200, $message = '', $data = [])
    {
        $respons = [
            'status'    => $code,
            'message'   => $message,
            'data'      => $data,
        ];

        return response()->json( $respons, $code );
    }

}