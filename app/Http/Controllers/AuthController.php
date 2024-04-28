<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('auth.pre-orders.index');
        }

        return back()->withErrors(['name' => 'The provided credentails didn\'t match our records.'])->onlyInput('name');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('home');
    }
}
