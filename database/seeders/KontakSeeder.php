<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    public function run(): void
    {

        Kontak::create([
            'alamat'   => 'Jl. Prabu Geusan Ulun No.36, Regol Wetan, Sumedang Selatan, Kabupaten Sumedang, Jawa Barat 45311',
            'email'    => 'disparbudporasumedang@gmail.com',
            'telepon1' => '0812-206-6291',
            'telepon2' => '0852-2259-2016',
            'telepon3' => '0858-7178-6613',
        ]);
    }
}
