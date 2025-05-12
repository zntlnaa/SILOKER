<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginproses(Request $request){
        if(Auth::attempt($request->only('name', 'email', 'level', 'password'))){
            return redirect('dashboard');
        }
        return redirect('/');
    }
    public function register(){
        return view('register1');   
    }
    public function registeruser(Request $request){
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/');
    }

}
