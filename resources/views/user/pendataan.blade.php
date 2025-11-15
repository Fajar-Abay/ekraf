@extends('layouts.app')

@section('title', 'Pendataan Pelaku Usaha')

@section('content')

@php
    $box_bg_color = 'bg-[#A4C0C7]';
    $header_bg_color = 'bg-[#073B4C]';
    $text_color = 'text-white/90';
    $input_style = 'block w-full border border-gray-300 rounded-lg shadow-inner py-2 px-4 focus:ring-white focus:border-white/50 bg-white/70 text-gray-800 placeholder-gray-500';
@endphp

<div class="container mx-auto px-4 py-12 md:py-16">
    <div class="max-w-6xl mx-auto space-y-12">
        <form action="{{ route('pendataan.store') }}" method="POST" class="space-y-12">
            @csrf

            {{-- DATA DIRI --}}
            <div class="relative pt-6">
                <div class="absolute top-0 left-0">
                    <div class="inline-flex items-center text-xl font-semibold text-white {{ $header_bg_color }} px-6 py-2 rounded-full shadow-lg">
                        <i class="fa-solid fa-user-tie mr-3"></i> Pelaku Usaha
                    </div>
                </div>

                <div class="{{ $box_bg_color }} p-6 md:p-8 rounded-2xl shadow-xl border border-white/50 mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-semibold {{ $text_color }} mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required placeholder="Masukkan nama lengkap..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="nik" class="block text-sm font-semibold {{ $text_color }} mb-1">NIK</label>
                            <input type="text" name="nik" id="nik" required maxlength="16" placeholder="Masukkan NIK (16 digit)" class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="no_telepon" class="block text-sm font-semibold {{ $text_color }} mb-1">No. Telepon</label>
                            <input type="tel" name="no_telepon" id="no_telepon" required placeholder="Masukkan nomor telepon..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-semibold {{ $text_color }} mb-1">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" id="tanggal_lahir" placeholder="Pilih tanggal lahir..." onfocus="this.type='date'" onblur="if(!this.value)this.type='text'" class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold {{ $text_color }} mb-1">Email</label>
                            <input type="email" name="email" id="email" placeholder="Masukkan email..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="jenis_kelamin" class="block text-sm font-semibold {{ $text_color }} mb-1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" required class="{{ $input_style }}">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ALAMAT --}}
            <div class="relative pt-6">
                <div class="absolute top-0 left-0">
                    <div class="inline-flex items-center text-xl font-semibold text-white {{ $header_bg_color }} px-6 py-2 rounded-full shadow-lg">
                        <i class="fa-solid fa-map-location-dot mr-3"></i> Alamat Usaha
                    </div>
                </div>

                <div class="{{ $box_bg_color }} p-6 md:p-8 rounded-2xl shadow-xl border border-white/50 mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div>
                            <label for="kecamatan_id" class="block text-sm font-semibold {{ $text_color }} mb-1">Kecamatan</label>
                            <select name="kecamatan_id" id="kecamatan_id" required class="{{ $input_style }}">
                                <option value="" disabled selected>Pilih Kecamatan</option>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:row-span-3">
                            <label for="alamat_lengkap" class="block text-sm font-semibold {{ $text_color }} mb-1">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" id="alamat_lengkap" rows="6" placeholder="Masukkan alamat lengkap..." class="{{ $input_style }}"></textarea>
                        </div>

                        <div>
                            <label for="desa_id" class="block text-sm font-semibold {{ $text_color }} mb-1">Desa / Kelurahan</label>
                            <select name="desa_id" id="desa_id" class="{{ $input_style }}" disabled>
                                <option value="">Pilih Kecamatan dahulu</option>
                            </select>
                        </div>

                        <div>
                            <label for="kode_pos" class="block text-sm font-semibold {{ $text_color }} mb-1">Kode POS</label>
                            <input type="text" name="kode_pos" id="kode_pos" placeholder="Kode POS otomatis" class="{{ $input_style }}" readonly>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DETAIL USAHA --}}
            <div class="relative pt-6">
                <div class="absolute top-0 left-0">
                    <div class="inline-flex items-center text-xl font-semibold text-white {{ $header_bg_color }} px-6 py-2 rounded-full shadow-lg">
                        <i class="fa-solid fa-pen-to-square mr-3"></i> Detail Usaha
                    </div>
                </div>

                <div class="{{ $box_bg_color }} p-6 md:p-8 rounded-2xl shadow-xl border border-white/50 mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div>
                            <label for="merk_usaha" class="block text-sm font-semibold {{ $text_color }} mb-1">Nama/Merek Usaha</label>
                            <input type="text" name="merk_usaha" id="merk_usaha" placeholder="Masukkan nama/merek usaha..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="akun_sosial_media" class="block text-sm font-semibold {{ $text_color }} mb-1">Akun Sosial Media</label>
                            <input type="text" name="akun_sosial_media" id="akun_sosial_media" placeholder="Masukkan akun sosial media..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="jenis_usaha" class="block text-sm font-semibold {{ $text_color }} mb-1">Jenis Usaha</label>
                            <input type="text" name="jenis_usaha" id="jenis_usaha" placeholder="Masukkan jenis usaha..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="url_website" class="block text-sm font-semibold {{ $text_color }} mb-1">URL Website</label>
                            <input type="url" name="url_website" id="url_website" placeholder="Masukkan URL website..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="status_usaha" class="block text-sm font-semibold {{ $text_color }} mb-1">Status Usaha</label>
                            <select name="status_usaha" id="status_usaha" class="{{ $input_style }}">
                                <option value="" disabled selected>Pilih Status Usaha</option>
                                <option value="Tidak Berbadan Usaha">Tidak Berbadan Usaha</option>
                                <option value="Perusahaan Perorangan">Perusahaan Perorangan</option>
                                <option value="Sanggar atau Perkumpulan">Sanggar atau Perkumpulan</option>
                                <option value="CV">CV</option>
                                <option value="Perseroan Terbatas (PT)">Perseroan Terbatas (PT)</option>
                                <option value="Firma">Firma</option>
                                <option value="Koperasi">Koperasi</option>
                                <option value="Yayasan">Yayasan</option>
                            </select>
                        </div>

                        <div>
                            <label for="url_ecommerce" class="block text-sm font-semibold {{ $text_color }} mb-1">URL E-commerce Usaha</label>
                            <input type="url" name="url_ecommerce" id="url_ecommerce" placeholder="Masukkan URL E-commerce..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="jumlah_tenaga_kerja" class="block text-sm font-semibold {{ $text_color }} mb-1">Jumlah Tenaga Kerja</label>
                            <input type="number" name="jumlah_tenaga_kerja" id="jumlah_tenaga_kerja" placeholder="Masukkan jumlah tenaga kerja..." class="{{ $input_style }}">
                        </div>

                        <div class="md:row-span-2">
                            <label for="deskripsi_kegiatan" class="block text-sm font-semibold {{ $text_color }} mb-1">Deskripsi Kegiatan Usaha</label>
                            <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" rows="4" placeholder="Deskripsikan kegiatan usaha..." class="{{ $input_style }}"></textarea>
                        </div>

                        <div>
                            <label for="lingkup_pemasaran" class="block text-sm font-semibold {{ $text_color }} mb-1">Lingkup Pemasaran</label>
                            <input type="text" name="lingkup_pemasaran" id="lingkup_pemasaran" placeholder="Contoh: Lokal/Nasional/Internasional" class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="asal_bahan" class="block text-sm font-semibold {{ $text_color }} mb-1">Asal Bahan</label>
                            <input type="text" name="asal_bahan" id="asal_bahan" placeholder="Masukkan asal bahan..." class="{{ $input_style }}">
                        </div>

                        <div>
                            <label for="pendapatan_per_bulan" class="block text-sm font-semibold {{ $text_color }} mb-1">Pendapatan Per Bulan</label>
                            <input type="number" name="pendapatan_per_bulan" id="pendapatan_per_bulan" placeholder="Masukkan pendapatan per bulan..." class="{{ $input_style }}" step="0.01">
                        </div>
                        <div>
                            <label for="subsektor" class="block text-sm font-semibold {{ $text_color }} mb-1">
                                Subsektor
                            </label>
                            <select name="subsektor_id" id="subsektor" class="{{ $input_style }}">
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                @foreach($subsektor as $sb)
                                    <option value="{{ $sb->id }}">{{ $sb->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="px-8 py-3 bg-[#073B4C] text-white font-semibold rounded-md shadow-lg hover:bg-[#062c38] transition duration-300">
                    <i class="fa-solid fa-paper-plane mr-2"></i> Daftar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const kecamatanSelect = document.getElementById('kecamatan_id');
    const desaSelect = document.getElementById('desa_id');
    const kodePosInput = document.getElementById('kode_pos');

    kecamatanSelect.addEventListener('change', function () {
        const kecamatanId = this.value;
        desaSelect.innerHTML = '<option>Memuat...</option>';
        kodePosInput.value = '';
        kodePosInput.disabled = true;

        if (!kecamatanId) return;

        fetch(`/get-desa/${kecamatanId}`)
            .then(res => res.json())
            .then(data => {
                desaSelect.innerHTML = '<option value="">Pilih Desa / Kelurahan</option>';
                data.forEach(desa => {
                    const option = document.createElement('option');
                    option.value = desa.id;
                    option.textContent = desa.nama_kelurahan;
                    option.dataset.kodepos = desa.kode_pos;
                    desaSelect.appendChild(option);
                });
                desaSelect.disabled = false;
            })
            .catch(err => console.error(err));
    });

    desaSelect.addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        kodePosInput.value = selected.dataset.kodepos || '';
        kodePosInput.disabled = !selected.dataset.kodepos;
    });
});
</script>

@endsection
