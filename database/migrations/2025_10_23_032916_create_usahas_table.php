<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usahas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik', 16);
            $table->string('no_telepon', 20);
            $table->date('tanggal_lahir')->nullable();
            $table->string('email')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('merk_usaha');
            $table->string('akun_sosial_media')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('url_website')->nullable();
            $table->enum('status_usaha', [
                'Tidak Berbadan Usaha',
                'Perusahaan Perorangan',
                'Sanggar atau Perkumpulan',
                'CV',
                'Perseroan Terbatas (PT)',
                'Firma',
                'Koperasi',
                'Yayasan',
            ])->nullable();

            $table->string('url_ecommerce')->nullable();
            $table->integer('jumlah_tenaga_kerja')->nullable();
            $table->text('deskripsi_kegiatan')->nullable();
            $table->string('lingkup_pemasaran')->nullable();
            $table->string('asal_bahan')->nullable();
            $table->decimal('pendapatan_per_bulan', 15, 2)->nullable();

            $table->foreignId('subsektor_id')->nullable()->constrained('subsektors')->onDelete('set null');
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans')->onDelete('set null');
            $table->foreignId('desa_id')->nullable()->constrained('desas')->onDelete('set null');

            $table->text('alamat_lengkap')->nullable();
            $table->string('kode_pos', 10)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usahas');
    }
};
