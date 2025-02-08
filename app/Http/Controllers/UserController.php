<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|regex:/^\d+$/', // Validasi agar hanya angka
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->route('loginemail');
    }

    public function loginWithEmail(Request $request){
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Cek apakah email dan password cocok dengan data yang ada di database
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, redirect ke halaman dashboard atau halaman utama
            return redirect()->intended('dashboard'); // Atau halaman yang diinginkan
        } else {
            // Jika login gagal, kembalikan pesan kesalahan
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function loginWithPhone(Request $request) {
        $request->validate([
            'phone_number' => 'required|string|regex:/^\d+$/',
        ]);
    
        // Cari user berdasarkan phone_number
        $user = User::where('phone_number', $request->phone_number)->first();
    
        if ($user) {
            // Login manual tanpa Auth::attempt()
            Auth::login($user);
    
            return redirect()->intended('otp'); // Redirect ke dashboard jika sukses
        } else {
            return back()->withErrors([
                'phone_number' => 'Nomor telepon tidak ditemukan.',
            ]);
        }
    }

    public function logout(Request $request){
        Auth::logout(); // Logout user

        $request->session()->invalidate(); // Hapus session yang aktif
        $request->session()->regenerateToken(); // Regenerasi CSRF token untuk keamanan

        return redirect()->route('welcome'); // Redirect ke halaman login
    }

}
