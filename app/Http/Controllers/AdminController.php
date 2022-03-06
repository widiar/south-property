<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        $cre = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($cre)) {
            return to_route('admin.index');
        } else {
            return to_route('login')->with('status', 'Email atau Password anda salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }
}
