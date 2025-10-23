@extends('layouts.admin')

@section('judul', 'Subsektor Ekonomi Kreatif')

@section('main')
<div class="p-6">
    <h1 class="text-2xl font-bold text-[#004b5c] mb-4">
        Subsektor {{ $subsektor->nama }}
    </h1>

    <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
        <div class="grid grid-cols-3 gap-4 text-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-[#004b5c]">{{ $totalUsaha }}</h2>
                <p class="text-gray-500 text-sm">Jumlah Pelaku</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-[#004b5c]">
                    {{ $rataPendapatan ? number_format($rataPendapatan, 0, ',', '.') : '—' }}
                </h2>
                <p class="text-gray-500 text-sm">Rata Pendapatan</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-[#004b5c]">{{ $totalKecamatan }}</h2>
                <p class="text-gray-500 text-sm">Kecamatan Tersebar</p>
            </div>
        </div>

        <h2 class="text-lg font-semibold text-[#004b5c] mb-3">Daftar Usaha</h2>
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
                            {{ is_numeric($usaha->pendapatan_per_bulan)
                                ? 'Rp' . number_format($usaha->pendapatan_per_bulan, 0, ',', '.')
                                : $usaha->pendapatan_per_bulan }}
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
            <a href="{{ url('/admin/subsektor') }}" class="text-blue-600 hover:underline">← Kembali</a>
        </div>
    </div>
</div>
@endsection
