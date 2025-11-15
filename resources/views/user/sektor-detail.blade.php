@extends('layouts.app')

@section('title', $subsektor->nama . ' - Ekonomi Kreatif Sumedang')

@section('content')

<section class="py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-[#073B4C] rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-[#073B4C] mb-2">{{ $subsektor->nama }}</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Informasi lengkap mengenai usaha ekonomi kreatif dalam subsektor ini</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <!-- Jumlah Usaha Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-l-4 border-[#073B4C] transform hover:scale-105 transition-transform duration-300">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-[#073B4C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-600 mb-1">Jumlah Usaha</h3>
                <p class="text-2xl font-bold text-[#073B4C]">{{ $jumlah_usaha }}</p>
                <p class="text-xs text-gray-500 mt-1">Usaha Terdaftar</p>
            </div>

            <!-- Tenaga Kerja Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-l-4 border-[#118AB2] transform hover:scale-105 transition-transform duration-300">
                <div class="w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-[#118AB2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-600 mb-1">Tenaga Kerja</h3>
                <p class="text-2xl font-bold text-[#118AB2]">{{ $jumlah_tenaga_kerja ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Total Pekerja</p>
            </div>

            <!-- Pendapatan Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-l-4 border-[#06D6A0] transform hover:scale-105 transition-transform duration-300">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-[#06D6A0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-600 mb-1">Pendapatan/Bulan</h3>
                <p class="text-2xl font-bold text-[#06D6A0]">Rp {{ number_format($pendapatan_total ?? 0, 0, ',', '.') }}</p>
                <p class="text-xs text-gray-500 mt-1">Total Pendapatan</p>
            </div>
        </div>

        <!-- Daftar Usaha Section -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Header Table -->
            <div class="bg-gradient-to-r from-[#073B4C] to-[#118AB2] px-4 py-4 sm:px-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Daftar Usaha</h3>
                        <p class="text-blue-100 text-sm mt-1">{{ $usahas->count() }} usaha terdaftar</p>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <div class="relative">
                            <input
                                type="text"
                                placeholder="Cari usaha..."
                                class="w-full sm:w-64 pl-10 pr-4 py-2 rounded-lg border-0 bg-white bg-opacity-20 text-white placeholder-blue-200 focus:bg-white focus:text-gray-900 focus:ring-2 focus:ring-white transition-all duration-300"
                            >
                            <svg class="absolute left-3 top-2.5 w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile View - Cards -->
            <div class="block sm:hidden divide-y divide-gray-100">
                @forelse ($usahas as $usaha)
                <div class="p-4 hover:bg-gray-50 transition-colors duration-200">
                    <div class="flex justify-between items-start mb-3">
                        <h4 class="font-semibold text-[#073B4C] text-lg">{{ $usaha->merk_usaha }}</h4>
                        <span class="bg-blue-100 text-[#073B4C] text-xs px-2 py-1 rounded-full font-medium">
                            {{ $usaha->jenis_usaha ?? 'Umum' }}
                        </span>
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-2 text-[#118AB2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span>{{ $usaha->jumlah_tenaga_kerja ?? 0 }} Tenaga Kerja</span>
                        </div>

                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-2 text-[#06D6A0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Rp {{ number_format($usaha->pendapatan_per_bulan ?? 0, 0, ',', '.') }}/bulan</span>
                        </div>
                    </div>

                    <button class="w-full mt-3 bg-[#457B9D] hover:bg-[#356E85] text-white text-sm font-medium py-2 px-4 rounded-lg transition-colors duration-300">
                        Lihat Detail
                    </button>
                </div>
                @empty
                <div class="p-8 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h4 class="text-lg font-semibold text-gray-500 mb-2">Belum Ada Usaha</h4>
                    <p class="text-gray-400 text-sm">Tidak ada usaha yang terdaftar dalam subsektor ini.</p>
                </div>
                @endforelse
            </div>

            <!-- Desktop View - Table -->
            <div class="hidden sm:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Merk Usaha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Usaha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tenaga Kerja</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pendapatan/Bulan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($usahas as $usaha)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-[#073B4C] rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div class="text-sm font-medium text-[#073B4C]">{{ $usaha->merk_usaha }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-[#073B4C]">
                                    {{ $usaha->jenis_usaha ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-[#118AB2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    {{ $usaha->jumlah_tenaga_kerja ?? 0 }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#06D6A0]">
                                Rp {{ number_format($usaha->pendapatan_per_bulan ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-[#457B9D] hover:text-[#356E85] transition-colors duration-300">
                                    Lihat Detail
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <h4 class="text-lg font-semibold text-gray-500 mb-2">Belum Ada Usaha</h4>
                                <p class="text-gray-400">Tidak ada usaha yang terdaftar dalam subsektor ini.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($usahas->hasPages())
            <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">{{ $usahas->firstItem() }}</span> hingga
                        <span class="font-medium">{{ $usahas->lastItem() }}</span> dari
                        <span class="font-medium">{{ $usahas->total() }}</span> hasil
                    </div>
                    <div class="flex space-x-2">
                        {{ $usahas->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Back Button -->
        <div class="mt-8 text-center">
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-[#457B9D] hover:text-[#356E85] font-medium transition-colors duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Halaman Sebelumnya
            </a>
        </div>
    </div>
</section>

<!-- JavaScript untuk fitur pencarian -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[type="text"]');
    const rows = document.querySelectorAll('tbody tr, .divide-y > div');

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});
</script>

<style>
    /* Custom styles for better mobile experience */
    @media (max-width: 640px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }

    /* Custom scrollbar for table */
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }

    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>
@endsection
