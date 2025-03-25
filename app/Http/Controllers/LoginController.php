<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        //     return redirect('/pelabuhan')->with('success', 'You are now logged in');
        // }
     
       if(Auth::attempt($attributes))
       {
        return redirect('/dashboard')->with('success-login', 'You are now logged in');
       }
        throw ValidationException::withMessages([
            'email' => 'Your provide credentials does not match our records.',
        ]);
    }
}
