<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PengajuanKegiatan;
use Carbon\Carbon;

class PengajuanKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $pengajuanKegiatan = PengajuanKegiatan::create([
            'anggota_id' => 1,
            'kegiatan' => 'Bersih-bersih',
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'deskripsi' => 'Bersih itu indah',
            'alamat' => 'Rt 24 Rw 10 Jl. Cipete No 205',
            'kelurahan' => 'Desa Pengauban',
            'kecamatan' => 'Ngaub',
            'kabupaten' => 'Surabaya',
            'provinsi' => 'Jawa Timur',
        ]);
    }
}
