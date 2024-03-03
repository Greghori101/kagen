<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])
        ) {
            $user = User::where('email', $request->email)->first();

            $remember = $request->remember_me;
            Auth::login($user, $remember);
            $accessToken = $user->createToken('API Token');
            $token = $accessToken->token;
            $data = [
                'id' => $user->id,
                'token' => $token,
            ];

            return response()->json($data, 200);
        } else {
            return abort(403);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function logout(Request $request)
    {
        $user = User::find($request->user()->id);
        if ($user) {
            $user->tokens()->delete();
            return response(200);
        } else {
            abort(403);
        }
    }
}
