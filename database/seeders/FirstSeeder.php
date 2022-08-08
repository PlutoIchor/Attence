<?php

namespace Database\Seeders;

use App\Models\RuangKelas;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RuangKelas::create([
            "nama_kelas" => "XII RPL",
            "wali_kelas" => "Faris"
        ]);
        RuangKelas::create([
            "nama_kelas" => "XI RPL",
            "wali_kelas" => "Unknown"
        ]);
        RuangKelas::create([
            "nama_kelas" => "X RPL",
            "wali_kelas" => "Unknown"
        ]);
        RuangKelas::create([
            "nama_kelas" => "XII AKL",
            "wali_kelas" => "Unknown"
        ]);
        RuangKelas::create([
            "nama_kelas" => "XI AKL",
            "wali_kelas" => "Unknown"
        ]);
        RuangKelas::create([
            "nama_kelas" => "X AKL",
            "wali_kelas" => "Unknown"
        ]);

        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12067,
            "nama_lengkap" => "Christian Dimas Sidauruk",
            "nama_panggilan" => "Dimas",
            "nomor_absen" => "6",
            "email" => "dimas@gmail.com",
            "no_telp" => "081563832997",
            "jk" => "Laki-Laki"
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12069,
            "nama_lengkap" => "Iqbal Muflishin",
            "nama_panggilan" => "Iqbal",
            "nomor_absen" => "15",
            "email" => "iqbal@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki"
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12069,
            "nama_lengkap" => "Muhammad Zein",
            "nama_panggilan" => "Zein",
            "nomor_absen" => "19",
            "email" => "zein@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki"
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12069,
            "nama_lengkap" => "Robben Ezackly Koresj",
            "nama_panggilan" => "Robben",
            "nomor_absen" => "28",
            "email" => "robben@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki"
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12069,
            "nama_lengkap" => "Rangga Usman Rifa'i",
            "nama_panggilan" => "Rangga",
            "nomor_absen" => "25",
            "email" => "rangga@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki"
        ]);

        Siswa::create([
            "id_kelas" => 3,
            "NIS" => 12069,
            "nama_lengkap" => "Gak Dikenal",
            "nama_panggilan" => "Gak",
            "nomor_absen" => "3",
            "email" => "anon@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki"
        ]);Siswa::create([
            "id_kelas" => 3,
            "NIS" => 12069,
            "nama_lengkap" => "Gak Dikenal",
            "nama_panggilan" => "Gak",
            "nomor_absen" => "25",
            "email" => "anon@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki"
        ]);Siswa::create([
            "id_kelas" => 3,
            "NIS" => 12069,
            "nama_lengkap" => "Gak Dikenal",
            "nama_panggilan" => "Gak",
            "nomor_absen" => "29",
            "email" => "anon@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki"
        ]);
    }
}
