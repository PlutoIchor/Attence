<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Senin',
            'mapel' => 'PPKN',
            'waktu_mulai' => '07:30:00',
            'waktu_berakhir' => '09:00:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Senin',
            'mapel' => 'Matematika',
            'waktu_mulai' => '09:00:00',
            'waktu_berakhir' => '10:35:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Senin',
            'mapel' => 'PWPB',
            'waktu_mulai' => '10:35:00',
            'waktu_berakhir' => '15:00:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Selasa',
            'mapel' => 'Bahasa Indonesia',
            'waktu_mulai' => '06:30:00',
            'waktu_berakhir' => '08:00:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Selasa',
            'mapel' => 'BK',
            'waktu_mulai' => '08:00:00',
            'waktu_berakhir' => '08:45:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Selasa',
            'mapel' => 'PBO',
            'waktu_mulai' => '08:45:00',
            'waktu_berakhir' => '11:50:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Selasa',
            'mapel' => 'PWPB',
            'waktu_mulai' => '12:45:00',
            'waktu_berakhir' => '15:00:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Rabu',
            'mapel' => 'Matematika',
            'waktu_mulai' => '06:30:00',
            'waktu_berakhir' => '08:00:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Rabu',
            'mapel' => 'Bahasa Jepang',
            'waktu_mulai' => '08:00:00',
            'waktu_berakhir' => '08:45:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Rabu',
            'mapel' => 'Agama',
            'waktu_mulai' => '08:45:00',
            'waktu_berakhir' => '11:20:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Rabu',
            'mapel' => 'PBO',
            'waktu_mulai' => '11:20:00',
            'waktu_berakhir' => '15:00:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Kamis',
            'mapel' => 'PBO',
            'waktu_mulai' => '06:30:00',
            'waktu_berakhir' => '11:50:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Kamis',
            'mapel' => 'Bahasa Inggris',
            'waktu_mulai' => '12:45:00',
            'waktu_berakhir' => '15:00:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Jumat',
            'mapel' => 'PBO',
            'waktu_mulai' => '06:30:00',
            'waktu_berakhir' => '12:45:00',
        ]);
        Jadwal::create([
            'id_kelas' => 1,
            'hari' => 'Jumat',
            'mapel' => 'PBO',
            'waktu_mulai' => '12:45:00',
            'waktu_berakhir' => '15:00:00',
        ]);
    }
}
