<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        return view("auth.login");
    }


    public function login(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        // Cek user berdasarkan email
        $user = User::where("email", $validated["email"])->first();

        if (!$user) {
            return redirect()->back()->with("error", "User tidak ditemukan");
        }

        // Cek password dengan Hash::check()
        if (!Hash::check($validated["password"], $user->password)) {
            return redirect()->back()->with("error", "Password salah");
        }

        // Login user
        Auth::login($user);

        // Redirect ke halaman setelah login
        return redirect()->route("admin.dashboard")->with("success", "Berhasil login!");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.page')->with('success', 'Berhasil logout!');
    }


}
