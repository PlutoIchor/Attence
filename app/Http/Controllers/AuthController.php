<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'min:5', 'max:50', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'phone_number' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required'
        ]);

        // Hashing password
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        $user->assignRole('admin');
        
        $request->session()->flash('success', 'Registrasi berhasil!');

        return redirect('/login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate(); 
             
            $user = Auth::user();
            // Code editor bilang error, tapi klo dijalanin bisa
            if($user->hasRole('admin'))
            {
                return redirect('/dashboard');
            } else {
                return redirect('/dashboardSiswa');
            }
        }

        return back()->with('error', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
