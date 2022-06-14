<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'Saya Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $anggota = User::create([
            'name' => 'Anggota',
            'username' => 'Saya Anggota',
            'email' => 'anggota@test.com',
            'password' => bcrypt('12345678'),
        ]);

        $anggota->assignRole('anggota');
    }
}
