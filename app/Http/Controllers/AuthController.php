<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        // Coba login
        if (!Auth::attempt($validated)) {
            return back()->with("error", "Email atau password salah!");
        }

        // Regenerate session untuk keamanan
        $request->session()->regenerate();

        // Redirect sesuai role
        $user = Auth::user();

        if ($user->role === "petugas") {
            return redirect()->route("petugas.artikel.index")->with("success", "Berhasil login sebagai Petugas!");
        }

        return redirect()->route("admin.dashboard")->with("success", "Berhasil login sebagai Admin!");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.page')->with('success', 'Berhasil logout!');
    }
}
