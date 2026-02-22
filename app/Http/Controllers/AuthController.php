<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(request $request){
        $fields = $request->validate([
            'phone' => 'required|integer',
            'password' => 'required|string'
            ]);

        $user = User::where('phone',$fields['phone'])->first();

        if(!$user){
            return response(['message' => 'Wrong phone'], 401);
        }

        if(!Hash::check($fields['password'], $user->password)){
            return response(['message' => 'Wrong password'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logged out'
        ]);
    }
}
