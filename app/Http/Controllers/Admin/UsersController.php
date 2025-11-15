<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Exception;

class UsersController extends Controller
{
    /**
     * Tampilkan daftar user dengan pencarian & pagination.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        try {
            $users = User::when($search, function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('admin.user.index', compact('users', 'search'));
        } catch (Exception $e) {
            Log::error('UsersController@index error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat memuat daftar user.');
        }
    }

    /**
     * Simpan user baru (via modal).
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,petugas',
        ]);

        try {
            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => $request->role,
            ]);

            return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!');
        } catch (Exception $e) {
            Log::error('UsersController@store error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menambahkan user.');
        }
    }

    /**
     * Update user (via modal).
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role'     => 'required|in:admin,petugas',
        ]);

        $data = $request->only('name', 'email', 'role');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        try {
            Log::info("Updating user", $data);
            $user->update($data);

            return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui!');
        } catch (Exception $e) {
            Log::error('UsersController@update error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui user.');
        }
    }

    /**
     * Hapus user.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
        } catch (Exception $e) {
            Log::error('UsersController@destroy error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat menghapus user.');
        }
    }
}
  