<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
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

    public function ubahPassword(Request $request)
    {
        $validatedData = $request->validate([
            'password_lama' => 'min:6|required',
            'password_baru' => 'min:6|required_with:konfirmasi_password_baru|same:konfirmasi_password_baru',
            'konfirmasi_password_baru' => 'min:6|required'
        ]);

        $user = Auth::user();
        $siswa = Siswa::where('email','=',$user->email)->first();

        $password_lama = $validatedData['password_lama'];
        $password_baru = Hash::make($validatedData['password_baru']);


        // Cek apakah dia tahu password yang lama
        if(password_verify($password_lama, $user->password))
        {
            $user->update(array('password' => $password_baru));
            $siswa->update(array('password' => 'Diubah oleh siswa'));

            return redirect('/profilSiswa')->with('success', 'Password berhasil diubah');
        } else {
            return redirect('/profilSiswa')->with('error', 'Password lama tidak sesuai');
        }
    }
}
