@extends('layouts.admin')

@section('judul', 'Rekap Pendaftaran')

@section('main')

<div class="relative w-full h-[45vh] flex flex-col items-center justify-center bg-cover bg-center"
    style="background-image: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.8)), url('{{ asset('image/bg.jpg') }}');">
    <h1 class="text-4xl md:text-5xl font-bold text-[#073B4C] mb-6">Rekap Pendaftaran</h1>

    {{-- Form pencarian --}}
    <form action="{{ route('admin.rekap') }}" method="GET" class="w-11/12 md:w-1/2">
        <div class="flex items-center bg-white rounded-full shadow-lg p-2">
            <input type="text" name="search" placeholder="Cari Nama atau Usaha..."
                class="flex-grow px-4 py-2 rounded-full outline-none text-gray-700"
                value="{{ request('search') }}">
            <button type="submit" class="bg-[#004b5c] text-white px-5 py-2 rounded-full hover:bg-[#036b82] transition">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>

<div class="p-6 md:p-10 grid md:grid-cols-4 gap-8">

    <div class="md:col-span-3 space-y-10">
        {{-- TABEL PELAKU USAHA --}}
        <div>
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-2xl font-bold text-[#004b5c]"> <i class="fa-solid fa-user"></i> Pelaku Usaha</h2>
                <div class="flex gap-2">
                    <button
                        class="bg-green-600 text-white px-4 py-1 rounded-lg hover:bg-green-700 transition flex items-center gap-2 text-sm">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </button>
                    <button
                        class="bg-red-600 text-white px-4 py-1 rounded-lg hover:bg-red-700 transition flex items-center gap-2 text-sm">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-x-auto">
                <table class="min-w-full border-collapse text-sm">
                    <thead class="bg-[#004b5c] text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Nama Lengkap</th>
                            <th class="py-3 px-4 text-left">No. Telepon</th>
                            <th class="py-3 px-4 text-left">Email</th>
                            <th class="py-3 px-4 text-left">NIK</th>
                            <th class="py-3 px-4 text-left">Tgl Lahir</th>
                            <th class="py-3 px-4 text-left">J. Kelamin</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($usahas as $usaha)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="py-3 px-4">{{ $loop->iteration + ($usahas->currentPage() - 1) * $usahas->perPage() }}</td>
                            <td class="py-3 px-4">{{ $usaha->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $usaha->no_telepon }}</td>
                            <td class="py-3 px-4">{{ $usaha->email }}</td>
                            <td class="py-3 px-4">{{ $usaha->nik }}</td>
                            <td class="py-3 px-4">{{ $usaha->tanggal_lahir ? \Carbon\Carbon::parse($usaha->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                            <td class="py-3 px-4">
                                {{ $usaha->jenis_kelamin == 'L' ? 'Laki-laki' : ($usaha->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}
                            </td>
                        </tr>
                        @empty
                        <tr class="border-b">
                            <td colspan="7" class="py-4 px-4 text-center text-gray-500">
                                Data pelaku usaha tidak ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginasi --}}
            <div class="mt-4">
                {{ $usahas->appends(request()->query())->links() }}
            </div>
        </div>

        <hr class="border-gray-300 my-10">

        {{-- TABEL ALAMAT USAHA --}}
        <div>
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-2xl font-bold text-[#004b5c]"> <i class="fa-solid fa-location-dot"></i> Alamat Usaha</h2>
                <div class="flex gap-2">
                    <button
                        class="bg-green-600 text-white px-4 py-1 rounded-lg hover:bg-green-700 transition flex items-center gap-2 text-sm">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </button>
                    <button
                        class="bg-red-600 text-white px-4 py-1 rounded-lg hover:bg-red-700 transition flex items-center gap-2 text-sm">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-x-auto">
                <table class="min-w-full border-collapse text-sm">
                    <thead class="bg-[#004b5c] text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Nama Pemilik</th>
                            <th class="py-3 px-4 text-left">Kecamatan</th>
                            <th class="py-3 px-4 text-left">Desa/Kelurahan</th>
                            <th class="py-3 px-4 text-left">Kode POS</th>
                            <th class="py-3 px-4 text-left">Alamat Lengkap</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($usahas as $usaha)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="py-3 px-4">{{ $loop->iteration + ($usahas->currentPage() - 1) * $usahas->perPage() }}</td>
                            <td class="py-3 px-4">{{ $usaha->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $usaha->kecamatan->nama_kecamatan ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $usaha->desa->nama_kelurahan ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $usaha->kode_pos ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $usaha->alamat_lengkap ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr class="border-b">
                            <td colspan="6" class="py-4 px-4 text-center text-gray-500">
                                Data alamat usaha tidak ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginasi --}}
            <div class="mt-4">
                {{ $usahas->appends(request()->query())->links() }}
            </div>
        </div>

        <hr class="border-gray-300 my-10">

        {{-- TABEL DETAIL USAHA --}}
        <div>
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-2xl font-bold text-[#004b5c]"> <i class="fa-solid fa-circle-info"></i> Detail Usaha</h2>
                <div class="flex gap-2">
                    <button
                        class="bg-green-600 text-white px-4 py-1 rounded-lg hover:bg-green-700 transition flex items-center gap-2 text-sm">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </button>
                    <button
                        class="bg-red-600 text-white px-4 py-1 rounded-lg hover:bg-red-700 transition flex items-center gap-2 text-sm">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-x-auto">
                <table class="min-w-full border-collapse text-sm">
                    <thead class="bg-[#004b5c] text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Merk Usaha</th>
                            <th class="py-3 px-4 text-left">Subsektor</th>
                            <th class="py-3 px-4 text-left">Akun Sosial Media</th>
                            <th class="py-3 px-4 text-left">Website</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left">Ecommerce</th>
                            <th class="py-3 px-4 text-left">Anggota</th>
                            <th class="py-3 px-4 text-left">Kegiatan</th>
                            <th class="py-3 px-4 text-left">Pemasaran</th>
                            <th class="py-3 px-4 text-left">Asal Bahan</th>
                            <th class="py-3 px-4 text-left">Pendapatan/Bulan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($usahas as $usaha)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="py-3 px-4">{{ $loop->iteration + ($usahas->currentPage() - 1) * $usahas->perPage() }}</td>
                            <td class="py-3 px-4">{{ $usaha->merk_usaha ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $usaha->subsektor->nama_subsektor ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $usaha->akun_sosial_media ?? '-' }}</td>
                            <td class="py-3 px-4">
                                @if ($usaha->website)
                                    <a href="{{ Str::startsWith($usaha->website, ['http://', 'https://']) ? $usaha->website : 'http://' . $usaha->website }}"
                                       target="_blank" class="text-blue-500 hover:underline break-all">
                                        {{ $usaha->website }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-3 px-4">{{ $usaha->status ?? '-' }}</td>
                            <td class="py-3 px-4">
                                @if ($usaha->ecommerce)
                                    <a href="{{ Str::startsWith($usaha->ecommerce, ['http://', 'https://']) ? $usaha->ecommerce : 'http://' . $usaha->ecommerce }}"
                                       target="_blank" class="text-blue-500 hover:underline break-all">
                                        Link
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-3 px-4">{{ $usaha->jumlah_anggota ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $usaha->jenis_kegiatan ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $usaha->pemasaran ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $usaha->asal_bahan ?? '-' }}</td>
                            <td class="py-3 px-4">
                                @if($usaha->pendapatan_per_bulan)
                                    Rp {{ number_format($usaha->pendapatan_per_bulan, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr class="border-b">
                            <td colspan="12" class="py-4 px-4 text-center text-gray-500">
                                Data detail usaha tidak ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginasi --}}
            <div class="mt-4">
                {{ $usahas->appends(request()->query())->links() }}
            </div>
        </div>

    </div>

    {{-- BAGIAN FILTER --}}
    <div class="bg-white rounded-3xl shadow-lg p-6 h-fit"
        x-data="{
            selectedKecamatan: '{{ request('kecamatan_id') }}',
            selectedDesa: '{{ request('desa_id') }}',
            desas: [],
            loading: false,

            async fetchDesas() {
                if (!this.selectedKecamatan) {
                    this.desas = [];
                    this.selectedDesa = '';
                    return;
                }
                this.loading = true;
                try {
                    const response = await fetch(`/get-desa/${this.selectedKecamatan}`);
                    this.desas = await response.json();
                } catch (error) {
                    console.error('Error fetching desas:', error);
                    this.desas = [];
                } finally {
                    this.loading = false;
                }
            },
            init() {
                if (this.selectedKecamatan) {
                    this.fetchDesas();
                }
            }
        }">
        <h2 class="text-lg font-semibold text-[#004b5c] mb-4">Filter</h2>

        <form action="{{ route('admin.rekap') }}" method="GET">
            <input type="hidden" name="search" value="{{ request('search') }}">
            <div class="space-y-4">

                {{-- Filter Kecamatan --}}
                <div class="form-group mb-3">
                    <label for="kecamatan_id" class="block text-sm font-medium text-gray-600 mb-1">Kecamatan</label>
                    <select name="kecamatan_id"
                        x-model="selectedKecamatan"
                        x-on:change="fetchDesas()"
                        class="w-full border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#004b5c]">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}" {{ request('kecamatan_\id') == $kecamatan->id ? 'selected' : '' }}>
                                {{ $kecamatan->nama_kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Desa --}}
                <div class="form-group mb-3">
                    <label for="desa_id" class="block text-sm font-medium text-gray-600 mb-1">Desa</label>
                    <select id="desa_id"
                        name="desa_id"
                        x-model="selectedDesa"
                        class="w-full border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#004b5c]"
                        :disabled="!selectedKecamatan || loading">
                        <option value="">-- Pilih Desa --</option>
                        <template x-for="desa in desas" :key="desa.id">
                            <option :value="desa.id" x-text="desa.nama_kelurahan"></option>
                        </template>
                    </select>
                    <p x-show="loading" class="text-xs text-gray-500 mt-1">Memuat data desa...</p>
                </div>

                {{-- Filter Jenis Kelamin --}}
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-600 mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#004b5c]">
                        <option value="">Semua</option>
                        <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <button type="submit" class="w-full mt-4 bg-[#004b5c] text-white py-2 rounded-lg hover:bg-[#036b82] transition">
                    Terapkan Filter
                </button>

                {{-- Tombol Reset Filter --}}
                @if (request()->hasAny(['desa_id', 'kecamatan_id', 'jenis_kelamin', 'search']))
                    <a href="{{ route('admin.rekap') }}" class="w-full block text-center mt-2 text-sm text-red-500 hover:text-red-700">
                        Reset Semua Filter
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection
