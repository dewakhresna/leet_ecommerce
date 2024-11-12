<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            return redirect()->route('user.home');
        } else {
            return redirect()->route('home')->with('error', 'Email atau password salah');
        }
    }
    public function logout()
    {
        // dd('logout');
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout Berhasil');
    }

    public function register()
    {
        return view('user.home');
    }

    public function register_proses(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password); // Hashing password
        $user->save();

        Auth::login($user); // Login otomatis setelah registrasi
        return redirect()->route('user.home')->with('success', 'Registrasi berhasil!');
    }
}