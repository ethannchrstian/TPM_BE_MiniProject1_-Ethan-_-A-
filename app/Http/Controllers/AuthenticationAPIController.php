<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthenticationAPIController extends Controller
{
    function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('Registeration Success', 201); 
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'requiredemail',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || Hash::check($request->password, $user->password)){
            return response('login gagal, credentials tidak sesuai.', 400);
        }

        return response ($user->createToken($user->email)->plainTextToken, 201);
    }

    function logout(Requet $request) {
        $request->user()->currentAccessToken()->delete();
        return response('Logout Success', 201);
    }
}
