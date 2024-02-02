<?php

namespace App\Http\Controllers\ClientCredentials;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;

class AuthController extends Controller
{
    public function index(): JsonResource
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function register(UserRegisterRequest $request): JsonResponse
    {
        $user = User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password)
            ]);
        return response()->json([
            'user' => $user,
            'access_token' => $user->createToken('authToken')->accessToken
            ], 201);
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email','password')))
            {
                return response()->json([
                    'status' => false,
                    'message'=> 'Email o Password incorrectos'
                    ],401);
            }
        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'message'=> 'Usuario loggeado',
            'user' => $user,
            'access_token' => $user->createToken('authToken')->accessToken
            ],200);
    }

}
