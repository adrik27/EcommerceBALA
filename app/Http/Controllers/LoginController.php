<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'tittlePage'    =>  'Login'
        ]);
    }

    public function authentication(Request $request)
    {
        $validatelogin = $request->validate([
            'email'         =>  'email:dns|required',
            'password'      =>  'required'
        ]);

        if (Auth::attempt($validatelogin)) {
            if (auth()->user()->role_id == '1') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
            return redirect()->intended('/');
        }
        return redirect()->back()->with('loginError', 'MAAF LOGIN GAGAL');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
