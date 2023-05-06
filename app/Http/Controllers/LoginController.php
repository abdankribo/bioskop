<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('username', $request->username)->first();
        if ($user) {
            if ($user->password == $request->password) {
                Auth::login($user);
                if ($user->is_admin == 1) {
                    LogActivity::insert([
                        "username" => $user->username,
                        "logged_at" =>  now(),
                    ]);
                    return redirect('/film');
                }
                LogActivity::insert([
                    "username" => $user->username,
                    "logged_at" =>  now(),
                ]);
                return redirect('/film/show');
            }
        }
        return redirect('/login')->with('error', 'Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
