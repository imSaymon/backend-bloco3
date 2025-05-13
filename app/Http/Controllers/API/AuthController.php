<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials)) \abort(401, 'Invalid Credentials');

        return \response()->json([
            'data' => [
                'token' => auth()->user()->createToken('default')->plainTextToken
            ]
        ]);
    }

    public function logout()
    {
        \auth()->user()->tokens()->delete(); //remove todos os tokens existentes

        return \response()->json([], 204);
    }
}
