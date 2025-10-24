@extends('layouts.app') 

@section('title', 'Pendataan Pelaku Usaha')

@section('content')

{{-- Definisi Warna dan Style Konsisten --}}
@php
    $box_bg_color = 'bg-[#A4C0C7]';
    $header_bg_color = 'bg-[#073B4C]'; // Warna biru gelap (sesuai permintaan)
    $text_color = 'text-white/90';
    $input_style = 'block w-full border border-gray-300 rounded-lg shadow-inner py-2 px-4 focus:ring-white focus:border-white/50 bg-white/70 text-gray-800 placeholder-gray-500';
@endphp

<div class="container mx-auto px-4 py-12 md:py-16">
    
    {{-- Lebar form: max-w-6xl --}}
    <div class="max-w-6xl mx-auto space-y-12">
        
        
        
        <form action="#" method="POST" class="space-y-12">
            {{-- @csrf --}} 

            <div class="relative pt-6">
                
                {{-- HEADER DIBUAT ABSOLUTE DI LUAR CARD --}}
                <div class="absolute top-0 left-0">
                    <div class="inline-flex items-center text-xl font-semibold text-white {{ $header_bg_color }} px-6 py-2 rounded-full shadow-lg">
                        <i class="fa-solid fa-user-tie mr-3"></i>
                        Pelaku Usaha
                    </div>
                </div>

                <div class="{{ $box_bg_color }} p-6 md:p-8 rounded-2xl shadow-xl border border-white/50 mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        
                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-semibold {{ $text_color }} mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required 
                                placeholder="Masukkan nama lengkap..." 
                                class="{{ $input_style }}">
                            <p class="text-xs {{ $text_color }} mb-2 italic">*(Sesuai kartu identitas resmi)</p> 
                        </div>

                        {{-- NIK --}}
                        <div>
                            <label for="nik" class="block text-sm font-semibold {{ $text_color }} mb-1">NIK</label>
                            <input type="text" name="nik" id="nik" required 
                            placeholder="Masukkan nomor induk kependudukan..."
                            class="{{ $input_style }}">
                            <p class="text-xs {{ $text_color }} mb-2 italic">*(Sesuai kartu identitas resmi)</p> 
                        </div>

                        {{-- No. Telepon --}}
                        <div>
                            <label for="no_telepon" class="block text-sm font-semibold {{ $text_color }} mb-1">No. Telepon</label>
                            <input type="tel" name="no_telepon" id="no_telepon" required 
                            placeholder="Masukkan nomor telepon..."
                            class="{{ $input_style }}">
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-semibold {{ $text_color }} mb-1">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" id="tanggal_lahir" required
                                placeholder="Masukkan tanggal lahir..." 
                                onfocus="this.type='date'" 
                                onblur="if(!this.value)this.type='text'"
                                class="{{ $input_style }} ">
                            <p class="text-xs {{ $text_color }} mb-2 italic">*(Sesuai kartu identitas resmi)</p> 
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold {{ $text_color }} mb-1">Email</label>
                            <input type="email" name="email" id="email" 
                            placeholder="Masukkan email..."
                            class="{{ $input_style }}">
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <label for="jenis_kelamin" class="block text-sm font-semibold {{ $text_color }} mb-1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" required 
                            class="{{ $input_style }}">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative pt-6">
                
                {{-- HEADER DIBUAT ABSOLUTE DI LUAR CARD --}}
                <div class="absolute top-0 left-0">
                    <div class="inline-flex items-center text-xl font-semibold text-white {{ $header_bg_color }} px-6 py-2 rounded-full shadow-lg">
                        <i class="fa-solid fa-map-location-dot mr-3"></i>
                        Alamat Usaha
                    </div>
                </div>

                <div class="{{ $box_bg_color }} p-6 md:p-8 rounded-2xl shadow-xl border border-white/50 mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        
                        {{-- Kecamatan --}}
                        <div>
                            <label for="kecamatan" class="block text-sm font-semibold {{ $text_color }} mb-1">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" required class="{{ $input_style }}">
                                <option value="" disabled selected class="text-gray-500">Pilih Kecamatan</option>
                                {{-- MENGGUNAKAN LOOP DARI DATABASE --}}
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Alamat Lengkap (Field besar di kolom kanan) --}}
                        <div class="md:row-span-3">
                            <label for="alamat_lengkap" class="block text-sm font-semibold {{ $text_color }} mb-1">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" id="alamat_lengkap" rows="6" required class="{{ $input_style }}"></textarea>
                        </div>

                        {{-- Desa / Kelurahan (Dropdown Dinamis) --}}
                        <div>
                            <label for="desa_kelurahan" class="block text-sm font-semibold {{ $text_color }} mb-1">Desa / Kelurahan</label>
                            <select name="desa_kelurahan" id="desa_kelurahan" required class="{{ $input_style }}" disabled>
                                <option value="">Pilih Kecamatan dahulu</option>
                                {{-- Opsi akan dimuat di sini oleh JavaScript --}}
                            </select>
                        </div>
                        
                        {{-- Kode POS (Dropdown Dinamis) --}}
                        <div>
                            <label for="kode_pos" class="block text-sm font-semibold {{ $text_color }} mb-1">Kode POS</label>
                            <select name="kode_pos" id="kode_pos" required class="{{ $input_style }}" disabled>
                                <option value="">Pilih Desa dahulu</option>
                                {{-- Opsi akan dimuat di sini oleh JavaScript --}}
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="relative pt-6">
                
                {{-- HEADER DIBUAT ABSOLUTE DI LUAR CARD --}}
                <div class="absolute top-0 left-0">
                    <div class="inline-flex items-center text-xl font-semibold text-white {{ $header_bg_color }} px-6 py-2 rounded-full shadow-lg">
                        <i class="fa-solid fa-pen-to-square mr-3"></i>
                        Detail Usaha
                    </div>
                </div>

                <div class="{{ $box_bg_color }} p-6 md:p-8 rounded-2xl shadow-xl border border-white/50 mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        
                        {{-- Merek Usaha --}}
                        <div>
                            <label for="merek_usaha" class="block text-sm font-semibold {{ $text_color }} mb-1">
                                Nama/Merek Usaha <span class="font-normal">(*Jika Ada)</span>
                            </label>
                            <input type="text" name="merek_usaha" id="merek_usaha" required 
                            placeholder="Masukkan nama/merk usaha"
                            class="{{ $input_style }}">
                            <p class="text-xs {{ $text_color }} mb-2 italic">*(Contoh: Dodol Mang Ipul, Jupiter Creative Studio, Distro Sumedang Asik, Dll)</p> 
                        </div>
                        
                        {{-- Akun Sosial Media --}}
                        <div>
                            <label for="akun_sosmed" class="block text-sm font-semibold {{ $text_color }} mb-1">Akun Sosial Media</label>
                            <input type="text" name="akun_sosmed" id="akun_sosmed" 
                            placeholder="Masukkan akun sosial media..."
                            class="{{ $input_style }}">
                        </div>

                        {{-- Jenis Usaha (Subsektor) --}}
                        <div>
                            <label for="jenis_usaha" class="block text-sm font-semibold {{ $text_color }} mb-1">Jenis Usaha</label>
                            <select name="jenis_usaha" id="jenis_usaha" required class="{{ $input_style }}">
                                <option value="" disabled selected>Pilih Jenis Usaha</option>
                                <option value="Perorangan">Perorangan</option>
                                <option value="Perusahaan">Perusahaan</option>
                                <option value="Komunitas">Komunitas</option>
                                <option value="Lembaga Pendidikan">Lembaga Pendidikan</option>
                            </select>
                        </div>

                        {{-- URL Website --}}
                        <div>
                            <label for="url_website" class="block text-sm font-semibold {{ $text_color }} mb-1">URL Website</label>
                            <input type="url" name="url_website" id="url_website" 
                            placeholder="Masukkan URL website..."
                            class="{{ $input_style }}">
                        </div>

                        {{-- Status Usaha --}}
                        <div>
                            <label for="status_usaha" class="block text-sm font-semibold {{ $text_color }} mb-1">Status Usaha</label>
                            <select name="status_usaha" id="status_usaha" required class="{{ $input_style }}">
                                <option value="" disabled selected>Pilih Status Usaha</option>
                                <option value="Tidak Berbadan Usaha">Tidak Berbadan Usaha</option>
                                <option value="Perusahaan Perorangan">Perusahaan Perorangan</option>
                                <option value="Sanggar atau Perkumpulan">Sanggar atau Perkumpulan</option>
                                <option value="CV">CV</option>
                                <option value="Perseroan Terbatas">Perseroan Terbatas (PT)</option>
                                <option value="Firma">Firma</option>
                                <option value="Koperasi">Koperasi</option>
                                <option value="Yayasan">Yayasan</option>
                            </select>
                        </div>

                        {{-- URL E-Commerce Usaha --}}
                        <div>
                            <label for="url_ecommerce" class="block text-sm font-semibold {{ $text_color }} mb-1">URL E-commerce Usaha <span class="font-normal">(*Isi Jika Ada)</span></label>
                            <input type="url" name="url_ecommerce" id="url_ecommerce" 
                            placeholder="Masukkan URL e-commerce usaha..."
                            class="{{ $input_style }}">
                        </div>

                        {{-- Jumlah Anggota/Tenaga Kerja --}}
                        <div>
                            <label for="jumlah_tenaga_kerja" class="block text-sm font-semibold {{ $text_color }} mb-1">Jumlah Anggota/Tim/Tenaga Kerja</label>
                            
                            <select name="jumlah_tenaga_kerja" id="jumlah_tenaga_kerja" required 
                                    class="{{ $input_style }}">
                                <option value="" disabled selected class="text-gray-500">Pilih Jumlah Anggota</option> 
                                <option value="1-10" >1 - 10 Anggota</option>
                                <option value="11-25">11 - 25 Anggota</option>
                                <option value="26-50">26 - 50 Anggota</option>
                                <option value="50-100">50 - 100 Anggota</option>
                                <option value=">100">Diatas 100 Anggota</option>
                            </select>
                        </div>
                        
                        {{-- Deskripsi Kegiatan Usaha (Field besar di kolom kanan, sekarang di baris pertama) --}}
                        <div class="md:row-span-2">
                            <label for="deskripsi_usaha" class="block text-sm font-semibold {{ $text_color }} mb-1">Deskripsi Kegiatan Usaha</label>
                            <textarea name="deskripsi_usaha" id="deskripsi_usaha" rows="4" required class="{{ $input_style }}"></textarea>
                            <p class="text-xs {{ $text_color }} mb-2 italic">*(Contoh: Web Development, Produksi Pakaian Anak-Anak, Pembuatan Alat Musik Tradisional, Aktor Teater, Pemain Kecapi, Dll)</p> 
                        </div>
                        

                        {{-- Lingkup Pemasaran --}}
                        <div>
                            <label for="lingkup_pemasaran" class="block text-sm font-semibold {{ $text_color }} mb-1">Lingkup Pemasaran</label>
                            <select name="lingkup_pemasaran" id="lingkup_pemasaran" required class="{{ $input_style }}">
                                <option value="" disabled selected>Pilih Lingkup</option>
                                <option value="Kec">Dalam Kecamatan</option>
                                <option value="Kab">Dalam Kabupaten</option>
                                <option value="Prov">Dalam Provinsi</option>
                                <option value="DN">Dalam Negeri</option>
                                <option value="LN">Luar Negeri</option>
                            </select>
                        </div>
                        
                        
                        
                        {{-- Asal Bahan --}}
                        <div>
                            <label for="asal_bahan" class="block text-sm font-semibold {{ $text_color }} mb-1">Asal Bahan</label>
                            <select name="asal_bahan" id="asal_bahan" required class="{{ $input_style }}">
                                <option value="" disabled selected>Pilih Asal Bahan</option>
                                <option value="Kec">Dalam Kecamatan</option>
                                <option value="Kab">Dalam Kabupaten</option>
                                <option value="Prov">Dalam Provinsi</option>
                                <option value="DN">Dalam Negeri</option>
                                <option value="LN">Luar Negeri</option>
                            </select>
                        </div>

                        {{-- Rata-Rata Pendapatan Per Bulan --}}
                        <div>
                            <label for="rata_rata_pendapatan" class="block text-sm font-semibold {{ $text_color }} mb-1">Rata-Rata Pendapatan Per Bulan</label>
                            
                            <select name="rata_rata_pendapatan" id="rata_rata_pendapatan" required 
                                    class="{{ $input_style }}">
                                <option value="" disabled selected class="text-gray-500">Pilih Kisaran Pendapatan</option> 
                                <option value="<1jt">Rp.0 - Rp1.000.000</option>
                                <option value="1jt-3jt">Rp1.000.000 - Rp3.000.000</option>
                                <option value="3jt-10jt">Rp3.000.000 - Rp10.000.000</option>
                                <option value="10jt-50jt">Rp10.000.000 - Rp50.000.000</option>
                                <option value="50jt-100jt">Rp50.000.000 - Rp100.000.000</option>
                                <option value=">100jt">Diatas Rp 100.000.000</option>
                            </select>
                        </div>
                    </div>
                    

                    {{-- Status Sertifikasi (Radio Button Vertikal Ya/Tidak) --}}
                    <div class="mt-8 pt-6 border-t border-white/50">
                        {{-- Teks Sertifikat HKI diubah warnanya --}}
                        <p class="text-sm font-semibold text-[#073B4C] mb-2">Memiliki Sertifikat Izin HKI:</p>
                        <div class="flex flex-col gap-2 text-sm">
                            <label class="inline-flex items-center">
                                {{-- Warna Radio Button diubah menjadi #073B4C --}}
                                <input type="radio" name="memiliki_sertifikat" value="Ya" class="form-radio text-[#073B4C] border-gray-300 focus:ring-[#073B4C]">
                                {{-- Warna Teks diubah menjadi #073B4C --}}
                                <span class="ml-2 font-medium text-[#073B4C]">Ya</span>
                            </label>
                            <label class="inline-flex items-center">
                                {{-- Warna Radio Button diubah menjadi #073B4C --}}
                                <input type="radio" name="memiliki_sertifikat" value="Tidak" class="form-radio text-[#073B4C] border-gray-300 focus:ring-[#073B4C]">
                                {{-- Warna Teks diubah menjadi #073B4C --}}
                                <span class="ml-2 font-medium text-[#073B4C]">Tidak</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="px-8 py-3 bg-[#073B4C] text-white font-semibold rounded-md shadow-lg hover:bg-[#062c38] transition duration-300">
                    <i class="fa-solid fa-paper-plane mr-2"></i> Daftar
                </button>
            </div>

        </form>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const kecamatanSelect = document.getElementById('kecamatan');
    const desaSelect = document.getElementById('desa_kelurahan');
    const kodePosSelect = document.getElementById('kode_pos');

    kecamatanSelect.addEventListener('change', function () {
        const kecamatanId = this.value;
        desaSelect.innerHTML = '<option>Memuat...</option>';
        kodePosSelect.innerHTML = '<option>Pilih Desa dahulu</option>';
        kodePosSelect.disabled = true;

        if (!kecamatanId) return;

        fetch(`/get-desa-kodepos-by-kecamatan/${kecamatanId}`)

            .then(res => res.json())
            .then(data => {
                desaSelect.innerHTML = '<option value="">Pilih Desa / Kelurahan</option>';
                data.forEach(desa => {
                    const option = document.createElement('option');
                    option.value = desa.id;
                    option.textContent = desa.nama;
                    option.dataset.kodepos = desa.kode_pos;
                    desaSelect.appendChild(option);
                });
                desaSelect.disabled = false;
            })
            .catch(err => console.error(err));
    });

    desaSelect.addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const kodePos = selected.dataset.kodepos || '';
        kodePosSelect.innerHTML = `<option value="${kodePos}" selected>${kodePos}</option>`;
        kodePosSelect.disabled = !kodePos;
    });
});

</script>


@endsection