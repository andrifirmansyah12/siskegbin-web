<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'user_id' => '1',
            'pangkat' => 'Major',
            'nrp' => '123',
            'jabatan' => 'Wadir 4',
        ]);
    }
}
