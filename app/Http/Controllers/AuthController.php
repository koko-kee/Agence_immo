<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    

    public function login()
    {
        return View('Auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
       if( Auth::attempt($credentials))
       {
           $request->session()->regenerate();
           return redirect()->intended(route('property.index')); 
       }
       return redirect()->route('login')->with('error','Email ou mot de passe incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
