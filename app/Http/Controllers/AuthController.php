<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    //
    public function register(Request $request){

        $fields= $request->validate(
            [
                'name'=> 'required|string',
                'email'=> 'required|string|unique:users,email',
                'password'=> 'required|string|confirmed'
            ]
            );
            //create user
            $user = User::create([
                'name'=>$fields['name'],
                'email'=>$fields['email'],
                'password'=>bcrypt($fields['password'])
            ]);

            //create token
            $token = $user->createToken('mytoken')->plainTextToken;

            $response =[
                'user'=> $user,
                'token'=> $token
            ];

            return response($response, 201);
    }

    public function login(Request $request){

        $fields= $request->validate(
            [
                'email'=> 'required',
                'password'=> 'required|string'
            ]
            );
            // Email check
            $user = User::where('email', $fields['email'])->first();

            //check password 

            if(!$user || !Hash::check($fields['password'], $user->password)){
                return response([
                    'message' => 'Invalid CREDENTIALS'
                ], 401);
            }

            //create token
            $token = $user->createToken('mytoken')->plainTextToken;

            $response =[
                'user'=> $user,
                'token'=> $token,
                'message'=> 'log in successful'
            ];

            return response($response, 201);
    }

    public function logout(Request $request){

        auth()->user()->tokens()->delete();
        return[
            'message' => 'Logged out, token deleted'
        ];

    }
}
