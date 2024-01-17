<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view("login");
    }

    public function register(){
        return view("register");
    }

    public function authRegister(Request $request){

        $request -> validate([

            "name" => 'required|string|max:250',
            "email" => 'required|email|max:250|unique:users',
            "password" => 'required|min:8|confirmed'

        ]);

        User::create([
            "name" => $request -> name,
            "email" => $request -> email,
            "password" => Hash::make($request->password) 
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect('/');
    }

    public function authLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect('/login');
    }

    public function authLogout() {
        Session::flush();
        Auth::logout();
  
        return redirect('/');
    }
}
