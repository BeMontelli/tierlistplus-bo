<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    public function user(Request $request)
    {
        $user = $request->user();
        $tokenObj = $user->currentAccessToken();
        return response()->json([
            'user' => $user,
            'token' => $tokenObj->token
        ], 201);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',// Minimum length of 8 characters
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/', // At least one uppercase letter, one lowercase letter, one number, and one special character
                'confirmed', // Requires matching password_confirmation field
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:8',// Minimum length of 8 characters
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/', // At least one uppercase letter, one lowercase letter, one number, and one special character
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('app_token_'.$user->id,[
            'read:users',
            'update:users',
            'create:tierlists',
            'read:tierlists',
            'update:tierlists',
            'delete:tierlists',
        ])->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        return "login";
    }
}
