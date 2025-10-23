@extends('layouts.admin')

@section('judul', 'Detail Kecamatan')

@section('main')
<div class="p-6 flex gap-6">
    {{-- Bagian kiri --}}
    <div class="flex-1">
        <h1 class="text-2xl font-bold text-[#004b5c] mb-4">
            Detail Kecamatan {{ $kecamatan->nama_kecamatan }}
        </h1>

        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
            <p class="text-gray-700 mb-2"><strong>Kode:</strong> {{ $kecamatan->kd_kecamatan }}</p>
            <p class="text-gray-700 mb-2"><strong>Total Usaha:</strong> {{ $totalUsaha }}</p>
            <p class="text-gray-700 mb-2"><strong>Rata-rata Pendapatan:</strong>
                {{ $rataPendapatan ? 'Rp' . number_format($rataPendapatan, 0, ',', '.') : '—' }}
            </p>
            <p class="text-gray-700 mb-4"><strong>Rata-rata Tenaga Kerja:</strong>
                {{ $rataTenaga ? round($rataTenaga, 1) : '—' }}
            </p>

            <h2 class="text-lg font-semibold text-[#004b5c] mt-6 mb-3">Daftar Usaha</h2>

            <table class="w-full text-sm border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-[#004b5c]">
                    <tr>
                        <th class="p-2 border">No</th>
                        <th class="p-2 border">Nama Pemilik</th>
                        <th class="p-2 border">Nama Usaha</th>
                        <th class="p-2 border">Jenis Usaha</th>
                        <th class="p-2 border">Pendapatan</th>
                        <th class="p-2 border">Tenaga Kerja</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usahas as $i => $usaha)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border text-center">{{ $i + 1 }}</td>
                            <td class="p-2 border">{{ $usaha->nama_lengkap }}</td>
                            <td class="p-2 border">{{ $usaha->merk_usaha }}</td>
                            <td class="p-2 border">{{ $usaha->jenis_usaha }}</td>
                            <td class="p-2 border">
                                {{ is_numeric($usaha->pendapatan_per_bulan) ? 'Rp' . number_format($usaha->pendapatan_per_bulan, 0, ',', '.') : $usaha->pendapatan_per_bulan }}
                            </td>
                            <td class="p-2 border text-center">{{ $usaha->jumlah_tenaga_kerja }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-3 text-center text-gray-500">Belum ada data usaha</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ url('/admin/database') }}" class="text-blue-600 hover:underline">← Kembali</a>
            </div>
        </div>
    </div>

    {{-- Bagian kanan (Filter) --}}
    <div class="w-64">
        <div class="bg-white shadow-md rounded-2xl border border-gray-200 p-4">
            <h2 class="font-semibold text-[#004b5c] mb-3">Filter</h2>

            <form action="" method="GET" class="space-y-2">
                <select name="filter" class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="">Pilih filter...</option>
                    <option value="terbanyak" {{ request('filter') == 'terbanyak' ? 'selected' : '' }}>Terbanyak</option>
                    <option value="tersedikit" {{ request('filter') == 'tersedikit' ? 'selected' : '' }}>Tersedikit</option>
                </select>

                <button type="submit"
                    class="w-full bg-[#004b5c] text-white py-2 rounded-lg hover:bg-[#006a7d] transition">
                    Terapkan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
