<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request) {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (!Auth::attempt($data)) {
            return [
                'message' => 'Unauthorized',
                'errors' => [
                    'login' => 'invalid credentials'
                ]
            ];
        }

        $token = $request->user()->createToken('name', ['admin']);

        return response([
            'data' => [
                'token_user' => $token->plainTextToken
            ]
        ], 401);
    }
}
