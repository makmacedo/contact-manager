<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller 
{
    /** 
     * Register new user in the database
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */ 
    public function store(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'password_confirmation' => 'required|same:password', 
        ]);

        if ($validator->fails()) { 
            return response()->json([
                'error'=> $validator->errors()
            ], 401);            
        }

        $user = User::create($request->all());
            
        $data = ['token' => $user->createToken('App')->accessToken];

        return response()->json([
            'success' => $data
        ], 200); 
    }

    /** 
     * Display the autenticated user.
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function show() 
    {
        return response()->json([
            'success' => Auth::user()
        ], 200); 
    }
}
