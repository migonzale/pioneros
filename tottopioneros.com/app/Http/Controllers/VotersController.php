<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class VotersController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->only('email', 'password');
        $token = null;
        dd(auth('api')->attempt($email));
        try {
            if (!$token = auth()->attempt($email)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Wrong email'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'errors' => [
                    'root' => 'Failed'
                ]
            ], $e->getStatusCode());
        }

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {

    }
}
