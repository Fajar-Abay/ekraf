@extends('layouts.admin')

@section('main')
<div class="container mx-auto px-4 py-8 max-w-5xl">

    {{-- Header dan tombol tambah --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#004b5c]">Daftar User</h2>
        <button
            onclick="openModal('addUserModal')"
            class="bg-[#118AB2] text-white px-4 py-2 rounded-lg hover:bg-[#0E799E] transition">
            + Tambah User
        </button>
    </div>

    {{-- Form pencarian --}}
    <form action="{{ route('admin.users.index') }}" method="GET" class="mb-6 flex gap-2">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama atau email..."
            class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#118AB2] outline-none transition"
        >
        <button
            type="submit"
            class="bg-[#004b5c] text-white px-4 py-2 rounded-lg hover:bg-[#073B4C] transition">
            Cari
        </button>
    </form>

    {{-- Tabel daftar user --}}
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full text-left border-collapse">
            <thead class="bg-[#004b5c] text-white">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <button
                            onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                            class="text-yellow-600 hover:text-yellow-800 font-medium">
                            Edit
                        </button>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button
                                onclick="return confirm('Yakin ingin menghapus user ini?')"
                                class="text-red-600 hover:text-red-800 font-medium">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 py-6">Belum ada user</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>

{{-- MODAL TAMBAH USER --}}
<div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h3 class="text-xl font-bold mb-4 text-[#004b5c]">Tambah User</h3>
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="name" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Role</label>
                <select name="role" class="w-full border rounded-lg px-3 py-2">
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('addUserModal')" class="px-4 py-2 border rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#118AB2] text-white rounded-lg hover:bg-[#0E799E] transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL EDIT USER --}}
<div id="editUserModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h3 class="text-xl font-bold mb-4 text-[#004b5c]">Edit User</h3>
        <form id="editUserForm" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input id="editName" type="text" name="name" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input id="editEmail" type="email" name="email" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Password (kosongkan jika tidak diubah)</label>
                <input id="editPassword" type="password" name="password" class="w-full border rounded-lg px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Role</label>
                <select id="editRole" name="role" class="w-full border rounded-lg px-3 py-2">
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('editUserModal')" class="px-4 py-2 border rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#118AB2] text-white rounded-lg hover:bg-[#0E799E] transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- SCRIPT UNTUK MODAL --}}
<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}

// Buka modal edit dengan data user
function openEditModal(id, name, email, role) {
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('editRole').value = role;
    document.getElementById('editPassword').value = '';

    const form = document.getElementById('editUserForm');
    form.action = `/admin/users/${id}`; // sesuai route PUT
    openModal('editUserModal');
}
</script>

@endsection
