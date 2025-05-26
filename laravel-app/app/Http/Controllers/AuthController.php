<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccompteFilter;
use App\Http\Requests\LoginFilter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(CreateAccompteFilter $request)
    {
        User::create($request->validated());

        return response()->json('user créé');
    }

    public function login(LoginFilter $request)
    {

        if (Auth::attempt($request->validated())) {

            $user = Auth::user();
            $token = $user->createToken('token_name')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
            // return response()->json(['message' => "Connection reussie"]);
        } else {


            return response()->json(['message' => "Connection refusée"], 401);
        };
    }
}
