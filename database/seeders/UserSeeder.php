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
            'username' => 'Pluto',
            'email' => 'pluto@role.test',
            'phone_number' => '081563832997',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('admin');

        $siswa = User::create([
            'username' => 'Dimas',
            'email' => 'dimas@role.test',
            'phone_number' => '081563832997',
            'password' => bcrypt('password')
        ]);

        $siswa->assignRole('siswa');
    }
}