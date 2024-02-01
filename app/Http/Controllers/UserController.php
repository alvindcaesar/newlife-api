<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginApi(Request $request)
    {
        $incomingFields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (auth()->attempt($incomingFields)) {
            $user = User::where('email',  $incomingFields['email'])->first();
            $token = $user->createToken('token')->plainTextToken;

            $response = [
                'token' => $token
            ];

            return response($response, 201);
        } else {
            return response([
                'message' => 'Invalid credentials'
            ], 401);
        }
    }
}
