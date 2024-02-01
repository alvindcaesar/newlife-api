<?php

namespace App\Http\Controllers;

use App\Models\SystemUser;
use Illuminate\Http\Request;

class SystemUserController extends Controller
{
    public function getUserByName($identifier)
    {
        // if (!auth()->check()) {
        //     return response()->json(['message' => 'Unauthenticated'], 401);
        // }

        $user = SystemUser::where('UserName', $identifier)->first();

        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}
