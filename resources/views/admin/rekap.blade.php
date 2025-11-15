@extends('layouts.admin')

@section('judul', 'Rekap Pendaftaran')

@section('main')

<div class="relative w-full h-[45vh] flex flex-col items-center justify-center bg-cover bg-center"
    style="background-image: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.8)), url('{{ asset('image/bg.jpg') }}');">
    <h1 class="text-4xl md:text-5xl font-bold text-[#073B4C] mb-6">Rekap Pendaftaran</h1>

    {{-- Form pencarian --}}
    <form action="{{ route('admin.rekap') }}" method="GET" class="w-11/12 md:w-1/2">
        <div class="flex items-center bg-white rounded-full shadow-lg p-2">
            <input type="text" name="search" placeholder="Cari Nama, Usaha, atau NIK..."
                class="flex-grow px-4 py-2 rounded-full outline-none text-gray-700"
                value="{{ request('search') }}">
            <button type="submit" class="bg-[#004b5c] text-white px-5 py-2 rounded-full hover:bg-[#036b82] transition">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>

<div class="p-6 md:p-10">
    {{-- TABEL UTAMA --}}
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <div class="flex items-center justify-between p-6 border-b">
            <h2 class="text-2xl font-bold text-[#004b5c]">
                <i class="fa-solid fa-users"></i> Data Pelaku Usaha
            </h2>
            <div class="flex gap-2">
                <button
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center gap-2 text-sm">
                    <i class="fas fa-file-excel"></i> Export Excel
                </button>
                <button
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition flex items-center gap-2 text-sm">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </button>
            </div>
        </div>

        {{-- Filter Section --}}
        <div class="p-6 border-b bg-gray-50">
            <form action="{{ route('admin.rekap') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4" id="filterForm">
                <input type="hidden" name="search" value="{{ request('search') }}">

                {{-- Filter Kecamatan --}}
                <div>
                    <label for="kecamatan_id" class="block text-sm font-medium text-gray-600 mb-1">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan_id" class="w-full border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#004b5c]">
                        <option value="">Semua Kecamatan</option>
                        @foreach($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}" {{ request('kecamatan_id') == $kecamatan->id ? 'selected' : '' }}>
                                {{ $kecamatan->nama_kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Desa --}}
                <div>
                    <label for="desa_id" class="block text-sm font-medium text-gray-600 mb-1">Desa</label>
                    <select id="desa_id" name="desa_id" class="w-full border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#004b5c]">
                        <option value="">Semua Desa</option>
                        @if(request('kecamatan_id'))
                            @php
                                $desas = \App\Models\Desa::where('kecamatan_id', request('kecamatan_id'))->get();
                            @endphp
                            @foreach($desas as $desa)
                                <option value="{{ $desa->id }}" {{ request('desa_id') == $desa->id ? 'selected' : '' }}>
                                    {{ $desa->nama_kelurahan }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <p id="loadingDesa" class="text-xs text-gray-500 mt-1 hidden">Memuat data desa...</p>
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

                <div class="flex items-end gap-2">
                    <button type="submit" class="w-full bg-[#004b5c] text-white py-2 rounded-lg hover:bg-[#036b82] transition">
                        Terapkan Filter
                    </button>

                    @if (request()->hasAny(['desa_id', 'kecamatan_id', 'jenis_kelamin', 'search']))
                        <a href="{{ route('admin.rekap') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Tabel Data --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse text-sm">
                <thead class="bg-[#004b5c] text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">#</th>
                        <th class="py-3 px-4 text-left">Nama Lengkap</th>
                        <th class="py-3 px-4 text-left">Merk Usaha</th>
                        <th class="py-3 px-4 text-left">Kecamatan</th>
                        <th class="py-3 px-4 text-left">Desa</th>
                        <th class="py-3 px-4 text-left">J. Kelamin</th>
                        <th class="py-3 px-4 text-left">Status Usaha</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($usahas as $usaha)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="py-3 px-4">{{ $loop->iteration + ($usahas->currentPage() - 1) * $usahas->perPage() }}</td>
                        <td class="py-3 px-4 font-medium">{{ $usaha->nama_lengkap }}</td>
                        <td class="py-3 px-4">{{ $usaha->merk_usaha }}</td>
                        <td class="py-3 px-4">{{ $usaha->kecamatan->nama_kecamatan ?? 'N/A' }}</td>
                        <td class="py-3 px-4">{{ $usaha->desa->nama_kelurahan ?? 'N/A' }}</td>
                        <td class="py-3 px-4">
                            {{ $usaha->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-full text-xs
                                {{ $usaha->status_usaha ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $usaha->status_usaha ?? 'Belum Ada' }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <button
                                    onclick="showDetail({{ $usaha->id }})"
                                    class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition text-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                                <button
                                    onclick="exportSingleData({{ $usaha->id }})"
                                    class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 transition text-sm">
                                    <i class="fas fa-download"></i> Export
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="border-b">
                        <td colspan="8" class="py-8 px-4 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-2 opacity-50"></i>
                            <p>Data pelaku usaha tidak ditemukan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginasi --}}
        <div class="p-4 border-t">
            {{ $usahas->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- Modal Detail --}}
<div id="detailModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        {{-- Modal Content --}}
        <div class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl">
            {{-- Modal Header --}}
            <div class="flex items-center justify-between p-6 border-b">
                <h3 class="text-xl font-bold text-[#004b5c]" id="modalTitle">Detail Data</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="p-6 max-h-[70vh] overflow-y-auto" id="modalBody">
                <div class="text-center py-8">
                    <i class="fas fa-spinner fa-spin text-3xl text-[#004b5c] mb-4"></i>
                    <p>Memuat data...</p>
                </div>
            </div>

            {{-- Modal Footer --}}
            <div class="flex justify-end gap-3 p-6 border-t">
                <button onclick="closeModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition">
                    Tutup
                </button>
                <button id="exportModalBtn" onclick="exportCurrentData()" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition flex items-center gap-2 hidden">
                    <i class="fas fa-download"></i> Export Data Ini
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Variabel global untuk menyimpan ID usaha yang sedang dilihat
let currentUsahaId = null;

// Fungsi untuk memuat data desa berdasarkan kecamatan
document.getElementById('kecamatan_id').addEventListener('change', function() {
    const kecamatanId = this.value;
    const desaSelect = document.getElementById('desa_id');
    const loadingDesa = document.getElementById('loadingDesa');

    if (!kecamatanId) {
        desaSelect.innerHTML = '<option value="">Semua Desa</option>';
        return;
    }

    loadingDesa.classList.remove('hidden');
    desaSelect.disabled = true;

    fetch(`/get-desa/${kecamatanId}`)
        .then(response => response.json())
        .then(desas => {
            let options = '<option value="">Semua Desa</option>';
            desas.forEach(desa => {
                options += `<option value="${desa.id}">${desa.nama_kelurahan}</option>`;
            });
            desaSelect.innerHTML = options;
        })
        .catch(error => {
            console.error('Error fetching desas:', error);
            desaSelect.innerHTML = '<option value="">Error memuat data</option>';
        })
        .finally(() => {
            loadingDesa.classList.add('hidden');
            desaSelect.disabled = false;
        });
});

// Fungsi untuk menampilkan modal detail
async function showDetail(usahaId) {
    currentUsahaId = usahaId;
    const modal = document.getElementById('detailModal');
    const modalBody = document.getElementById('modalBody');
    const modalTitle = document.getElementById('modalTitle');
    const exportBtn = document.getElementById('exportModalBtn');

    // Tampilkan modal
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Tampilkan loading
    modalBody.innerHTML = `
        <div class="text-center py-8">
            <i class="fas fa-spinner fa-spin text-3xl text-[#004b5c] mb-4"></i>
            <p>Memuat data...</p>
        </div>
    `;

    exportBtn.classList.add('hidden');

    try {
        const response = await fetch(`/admin/usaha/${usahaId}`);
        const data = await response.json();

        // Format data untuk ditampilkan
        modalTitle.textContent = `Detail Data: ${data.nama_lengkap}`;
        modalBody.innerHTML = createDetailContent(data);
        exportBtn.classList.remove('hidden');

    } catch (error) {
        console.error('Error fetching data:', error);
        modalBody.innerHTML = `
            <div class="text-center py-8 text-red-500">
                <i class="fas fa-exclamation-triangle text-3xl mb-4"></i>
                <p>Gagal memuat data. Silakan coba lagi.</p>
            </div>
        `;
    }
}

// Fungsi untuk membuat konten detail
function createDetailContent(data) {
    const formatDate = (dateString) => {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID');
    };

    const formatCurrency = (amount) => {
        if (!amount) return '-';
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(amount);
    };

    const createLink = (url, text = 'Link') => {
        if (!url) return '-';
        const fullUrl = url.startsWith('http') ? url : `http://${url}`;
        return `<a href="${fullUrl}" target="_blank" class="text-blue-500 hover:underline">${text}</a>`;
    };

    return `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Data Pribadi --}}
            <div class="space-y-4">
                <h4 class="font-semibold text-lg text-[#004b5c] border-b pb-2">
                    <i class="fas fa-user mr-2"></i>Data Pribadi
                </h4>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div><strong>Nama:</strong></div>
                    <div>${data.nama_lengkap}</div>

                    <div><strong>NIK:</strong></div>
                    <div>${data.nik}</div>

                    <div><strong>Telepon:</strong></div>
                    <div>${data.no_telepon}</div>

                    <div><strong>Email:</strong></div>
                    <div>${data.email || '-'}</div>

                    <div><strong>Tanggal Lahir:</strong></div>
                    <div>${formatDate(data.tanggal_lahir)}</div>

                    <div><strong>Jenis Kelamin:</strong></div>
                    <div>${data.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan'}</div>
                </div>
            </div>

            {{-- Data Usaha --}}
            <div class="space-y-4">
                <h4 class="font-semibold text-lg text-[#004b5c] border-b pb-2">
                    <i class="fas fa-store mr-2"></i>Data Usaha
                </h4>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div><strong>Merk Usaha:</strong></div>
                    <div>${data.merk_usaha}</div>

                    <div><strong>Subsektor:</strong></div>
                    <div>${data.subsektor ? data.subsektor.nama_subsektor : '-'}</div>

                    <div><strong>Status Usaha:</strong></div>
                    <div>${data.status_usaha || '-'}</div>

                    <div><strong>Jenis Usaha:</strong></div>
                    <div>${data.jenis_usaha || '-'}</div>

                    <div><strong>Tenaga Kerja:</strong></div>
                    <div>${data.jumlah_tenaga_kerja || '-'}</div>
                </div>
            </div>

            {{-- Alamat --}}
            <div class="space-y-4">
                <h4 class="font-semibold text-lg text-[#004b5c] border-b pb-2">
                    <i class="fas fa-map-marker-alt mr-2"></i>Alamat
                </h4>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div><strong>Kecamatan:</strong></div>
                    <div>${data.kecamatan ? data.kecamatan.nama_kecamatan : '-'}</div>

                    <div><strong>Desa:</strong></div>
                    <div>${data.desa ? data.desa.nama_kelurahan : '-'}</div>

                    <div><strong>Kode Pos:</strong></div>
                    <div>${data.kode_pos || '-'}</div>

                    <div><strong>Alamat Lengkap:</strong></div>
                    <div class="col-span-1">${data.alamat_lengkap || '-'}</div>
                </div>
            </div>

            {{-- Informasi Tambahan --}}
            <div class="space-y-4">
                <h4 class="font-semibold text-lg text-[#004b5c] border-b pb-2">
                    <i class="fas fa-info-circle mr-2"></i>Informasi Tambahan
                </h4>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div><strong>Sosial Media:</strong></div>
                    <div>${data.akun_sosial_media || '-'}</div>

                    <div><strong>Website:</strong></div>
                    <div>${data.url_website ? createLink(data.url_website, data.url_website) : '-'}</div>

                    <div><strong>E-commerce:</strong></div>
                    <div>${data.url_ecommerce ? createLink(data.url_ecommerce) : '-'}</div>

                    <div><strong>Pemasaran:</strong></div>
                    <div>${data.lingkup_pemasaran || '-'}</div>

                    <div><strong>Asal Bahan:</strong></div>
                    <div>${data.asal_bahan || '-'}</div>

                    <div><strong>Pendapatan/Bulan:</strong></div>
                    <div>${formatCurrency(data.pendapatan_per_bulan)}</div>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="md:col-span-2 space-y-4">
                <h4 class="font-semibold text-lg text-[#004b5c] border-b pb-2">
                    <i class="fas fa-file-alt mr-2"></i>Deskripsi Kegiatan
                </h4>
                <p class="text-sm text-gray-700 bg-gray-50 p-3 rounded-lg">${data.deskripsi_kegiatan || 'Tidak ada deskripsi'}</p>
            </div>
        </div>
    `;
}

// Fungsi untuk menutup modal
function closeModal() {
    const modal = document.getElementById('detailModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
    currentUsahaId = null;
}

// Fungsi untuk export data dari tabel
async function exportSingleData(usahaId) {
    try {
        const response = await fetch(`/admin/usaha/${usahaId}/export`);
        const result = await response.json();

        alert(`Export data untuk ${result.data.nama_lengkap} berhasil!`);
        console.log('Data untuk export:', result);

    } catch (error) {
        console.error('Error exporting data:', error);
        alert('Gagal mengekspor data');
    }
}

// Fungsi untuk export dari modal
function exportCurrentData() {
    if (currentUsahaId) {
        exportSingleData(currentUsahaId);
    }
}

// Tutup modal ketika klik di luar konten modal
document.getElementById('detailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Tutup modal dengan tombol ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>
@endpush
