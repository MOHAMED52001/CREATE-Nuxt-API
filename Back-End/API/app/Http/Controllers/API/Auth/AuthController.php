<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\Traits\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Http\Requests\API\V1\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    use APIResponse;

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $token = $request->user()->createToken("{$request->user()->email}")->plainTextToken;

        return $this->success(200, "login.success", $token);
    }
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' => 2,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken("{$user->email}")->plainTextToken;

        return $this->success(200, "login.success", $token);
    }
    public function user(Request $request)
    {
    }
    public function logout(Request $request)
    {
    }
}
