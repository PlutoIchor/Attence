<?php

namespace Database\Seeders;

use App\Models\RuangKelas;
use Illuminate\Database\Seeder;

class RuangKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RuangKelas::create([
            "id_user" => 1,
            "nama_kelas" => "XII RPL",
            "wali_kelas" => "Faris"
        ]);
        RuangKelas::create([
            "id_user" => 1,
            "nama_kelas" => "XI RPL",
            "wali_kelas" => "Unknown"
        ]);
        RuangKelas::create([
            "id_user" => 1,
            "nama_kelas" => "X RPL",
            "wali_kelas" => "Unknown"
        ]);
    }
}
