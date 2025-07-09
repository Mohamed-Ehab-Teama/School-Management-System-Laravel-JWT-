<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\Helpers;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;



class AuthController extends Controller
{
    /**
     * Register function
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        if($user)
        {
            return Helpers::sendResponse(200, 'User Created Successfully', []);
        }
        return Helpers::sendResponse(400, 'something went wrong', []);
    }



    /**
     * Login function
     */
    public function login(LoginRequest $request)
    {
        $response = [];
        $data = $request->validated();

        $token = auth('api')->attempt($data);
        if( !$token )
        {
            return Helpers::sendResponse(200, 'Invalid Credentials', []);
        }

        $response = [
            'token'     => $token,
            'user_id'      => auth('api')->user()->id,
        ];

        return Helpers::sendResponse(200, 'Login Success', $response);
    }



    /**
     * Logout function
     */
    public function logout()
    {
        auth('api')->logout();
        return Helpers::sendResponse(200, 'Loged Out Success', []);
    }
}
