<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\TokenResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthContoller extends Controller
{
    public function login(LoginRequest $request)
    {
        $email    = $request->input(LoginRequest::PARAMETER_EMAIL);
        $password = $request->input(LoginRequest::PARAMETER_PASSWORD);

        $user = User::where(User::EMAIL, $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'phone' => ['The provided credentials are incorrect.'],
            ]);
        }
        return new TokenResource($user->createToken($user->email));
    }
}
