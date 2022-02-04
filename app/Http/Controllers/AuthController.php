<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->to('/');
        } else {
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'username' => ucwords(strtolower($request->username)),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        

        return redirect()->to('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
