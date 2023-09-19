<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = $request->validate([
            'username' => ['required','unique:users'],
            'password' => ['required'],
        ]);

        User::create($user);
        return redirect()->route('login')->with('success', 'Berhasil mendaftar, silahkan login');
    }
}
