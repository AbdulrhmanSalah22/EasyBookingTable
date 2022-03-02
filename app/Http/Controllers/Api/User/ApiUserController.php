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

    //     public function register(Request $request){
    //         $validator = Validator::make($request->all(),
    //         [
    //             'name' => 'required|min:3|max:12',
    //             'email' => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
    //             'phone' => 'required|min:11|max:11',
    //             'password' => 'required|min:6|max:12',
    //         ]);

    //         if($validator->fails()){
    //            return response()->json(['status_code' => 400 , 'message' => $validator->errors()]);
    //         }

    //         $user = new User();
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->phone = $request->phone;
    //         $user->password =  bcrypt($request->password) ;
    //         $user->save();

    //         return response()->json(
    //             ['status_code' => 200 , 'message' => 'User Created Successfully']);
    //    }


    public function register(UserRegisterRequest $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  bcrypt($request->password);
        $user->save();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['status_code' => 200, 'message' => 'user created successfully', 'token' => $token]);
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
            ['status_code' => 200, 'token' => $token]
        );
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status_code' => 200, 'message' => 'Token deleted and you are now logout!!']);
    }
}
