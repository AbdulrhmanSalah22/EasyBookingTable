<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRegisterRequest;
use App\Http\Requests\Api\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;



class ApiUserController extends Controller
{

    public function register(UserRegisterRequest $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  bcrypt($request->password);
        $user->save();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['status_code' => 200, 'message' => 'user created successfully', 'token' => 'Bearer '.$token]);
    }


    public function login(UserLoginRequest $request)
    {

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {

            return response()->json(['status_code' => 500, 'message' => 'Email or password not correct']);

        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(
            ['status_code' => 200, 'token' => 'Bearer '.$token]
        );
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status_code' => 200, 'message' => 'Token deleted and you are now logout!!']);
    }
}
