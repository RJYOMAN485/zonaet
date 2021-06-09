<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class AuthController extends Controller
{
    //
    public function register() {
        return view('auth.register');
    }

    public function storeUser(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ]);
    }


    public function login() {

    }
}
