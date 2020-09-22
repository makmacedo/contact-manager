<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /** 
     * login into api using credentials and returning api token
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request) 
    { 
        $autenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        

        $user = Auth::user();

        if ($autenticated) {
            return response()->json([
                'token' => $user->createToken('App')->accessToken
            ], 200); 
        } 
        
        return response()->json([
            'error' => 'Unauthorised'
        ], 401); 
    }

    /** 
     * revoke api token
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function logout() 
    { 
        Auth::user()->token()->revoke();

        return response()->json([
            'success' => 'API token revoked!'
        ], 200); 
    }
}
