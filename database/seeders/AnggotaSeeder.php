<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anggota::create([
            'name' => 'Dulmin',
            'pangkat' => 'Major',
            'wrp' => '123',
            'jabatan' => 'Wadir 4',
            'desa' => 'Ujung Kulon',
        ]);
    }
}
