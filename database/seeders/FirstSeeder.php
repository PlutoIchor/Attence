<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\RuangKelas;
use App\Models\Siswa;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "username" => "christian_dimas",
            "email" => "dimas@gmail.com",
            "phone_number" => "081563832997",
            "password" => Hash::make("password"),
        ]);

        User::create([
            "username" => "iqbal_muflishin",
            "email" => "iqbal@gmail.com",
            "phone_number" => "081500000000",
            "password" => Hash::make("password"),
        ]);

        User::create([
            "username" => "rizki_rachmadanni",
            "email" => "rizki@gmail.com",
            "phone_number" => "081500000000",
            "password" => Hash::make("password"),
        ]);

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

        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12062,
            "nama_lengkap" => "Achmad Dhani Syahputra",
            "nama_panggilan" => "Dhani",
            "nomor_absen" => "1",
            "email" => "dhani@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "hYhtFghgfT",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12063,
            "nama_lengkap" => "Ahmad Dzulfikar As Shavy",
            "nama_panggilan" => "Delep",
            "nomor_absen" => "2",
            "email" => "delep@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "ihjTGftFRe",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12064,
            "nama_lengkap" => "Aldy Revigustian",
            "nama_panggilan" => "Aldy",
            "nomor_absen" => "3",
            "email" => "aldy@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "ikjYtgFtdr",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12065,
            "nama_lengkap" => "Asfari Iwaldy",
            "nama_panggilan" => "Asfari",
            "nomor_absen" => "4",
            "email" => "asfari@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "qwErdERftd",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12066,
            "nama_lengkap" => "Chairul Syahputra",
            "nama_panggilan" => "Arul",
            "nomor_absen" => "5",
            "email" => "arul@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "syhafTFrcf",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12067,
            "nama_lengkap" => "Christian Dimas Sidauruk",
            "nama_panggilan" => "Dimas",
            "nomor_absen" => "6",
            "email" => "dimas@gmail.com",
            "no_telp" => "081563832997",
            "jk" => "Laki-Laki",
            "password" => "ojTfrtGhgF",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12068,
            "nama_lengkap" => "Danang Joyo",
            "nama_panggilan" => "Danang",
            "nomor_absen" => "7",
            "email" => "danang@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "ygdhtsFRTg",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12069,
            "nama_lengkap" => "Dina Camelia Putri",
            "nama_panggilan" => "Dina",
            "nomor_absen" => "8",
            "email" => "dina@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempuan",
            "password" => "oMaigotRYT",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12070,
            "nama_lengkap" => "Dwi Arya Putra",
            "nama_panggilan" => "Dwi",
            "nomor_absen" => "9",
            "email" => "dwi@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "aMonGGUsyy",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12071,
            "nama_lengkap" => "Dzulfiqar Azhar Al Ghifari",
            "nama_panggilan" => "Dzul",
            "nomor_absen" => "10",
            "email" => "dzul@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phdgsfdhtdh",
        ]);

        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12072,
            "nama_lengkap" => "Ezhar Mahesa",
            "nama_panggilan" => "Ezhar",
            "nomor_absen" => "11",
            "email" => "ezhar@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phdgsfYdtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12073,
            "nama_lengkap" => "Fernando Aji Saputro",
            "nama_panggilan" => "Nando",
            "nomor_absen" => "12",
            "email" => "nando@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phSsTfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12074,
            "nama_lengkap" => "Fitri Anggrayani",
            "nama_panggilan" => "Fitri",
            "nomor_absen" => "13",
            "email" => "fitri@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempuan",
            "password" => "phdUUTdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12568,
            "nama_lengkap" => "Muhammad Dzacky Alfie Reynaldy",
            "nama_panggilan" => "Jaki",
            "nomor_absen" => "14",
            "email" => "jaki@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "Trdgsfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12078,
            "nama_lengkap" => "Muhammad Iqbal Muflishin",
            "nama_panggilan" => "Iqbal",
            "nomor_absen" => "15",
            "email" => "iqbal@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "pyyTDfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12079,
            "nama_lengkap" => "Muhammad Nino Pratama",
            "nama_panggilan" => "Nino",
            "nomor_absen" => "16",
            "email" => "nino@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phdgsoohtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12080,
            "nama_lengkap" => "Muhammad Raka Dainuri",
            "nama_panggilan" => "Raka",
            "nomor_absen" => "17",
            "email" => "raka@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "oPdgsfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12081,
            "nama_lengkap" => "Muhammad Richo Rahardyan",
            "nama_panggilan" => "Richo",
            "nomor_absen" => "18",
            "email" => "richo@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phdgsfoiTYG",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12082,
            "nama_lengkap" => "Muhammad Zein",
            "nama_panggilan" => "Zein",
            "nomor_absen" => "19",
            "email" => "zein@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "hFtgsfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12083,
            "nama_lengkap" => "Nabilah Kathryna",
            "nama_panggilan" => "Katy",
            "nomor_absen" => "20",
            "email" => "katy@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempuan",
            "password" => "phdGHGdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12084,
            "nama_lengkap" => "Najwa Aura Hastin",
            "nama_panggilan" => "Najwa",
            "nomor_absen" => "21",
            "email" => "najwa@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempuan",
            "password" => "ssGtfRRtjh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12566,
            "nama_lengkap" => "Nazwa Mutiara Dewi",
            "nama_panggilan" => "Nazwa",
            "nomor_absen" => "22",
            "email" => "nazwa@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempuan",
            "password" => "phdgsfdloL",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12085,
            "nama_lengkap" => "Neina Rahma Sari",
            "nama_panggilan" => "Neina",
            "nomor_absen" => "23",
            "email" => "neina@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempuan",
            "password" => "OOOgsfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12086,
            "nama_lengkap" => "Nur A'Li",
            "nama_panggilan" => "Ali",
            "nomor_absen" => "24",
            "email" => "ali@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "ppITsfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12087,
            "nama_lengkap" => "Rangga Usman Rifa'i",
            "nama_panggilan" => "Rangga",
            "nomor_absen" => "25",
            "email" => "rangga@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phdPPfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12088,
            "nama_lengkap" => "Rizki Alamsyah",
            "nama_panggilan" => "Alam",
            "nomor_absen" => "26",
            "email" => "alam@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "Mhdgsfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12089,
            "nama_lengkap" => "Rizki Rachmadanni",
            "nama_panggilan" => "Rizki",
            "nomor_absen" => "27",
            "email" => "rizki@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "pIPgsfdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12090,
            "nama_lengkap" => "Robben Ezackly Koresj",
            "nama_panggilan" => "Robben",
            "nomor_absen" => "28",
            "email" => "robben@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phdgsfALtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12091,
            "nama_lengkap" => "Samiranadifa Azzahra",
            "nama_panggilan" => "Difa",
            "nomor_absen" => "29",
            "email" => "difa@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempuan",
            "password" => "phdgsfALtLM",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12092,
            "nama_lengkap" => "Sava Raisya Ferdinal",
            "nama_panggilan" => "Sava",
            "nomor_absen" => "30",
            "email" => "sava@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phdgsFdhtMN",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12093,
            "nama_lengkap" => "Tasya Bernika Tamyanna Simamora",
            "nama_panggilan" => "Tasya",
            "nomor_absen" => "30",
            "email" => "tasya@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempuan",
            "password" => "phdgsfdhtMN",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12095,
            "nama_lengkap" => "Zhevanya Revalia Vendra",
            "nama_panggilan" => "Zhevanya",
            "nomor_absen" => "32",
            "email" => "zhevanya@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Perempaun",
            "password" => "phdALLdhtdh",
        ]);
        Siswa::create([
            "id_kelas" => 1,
            "NIS" => 12096,
            "nama_lengkap" => "Zoe Mohamed",
            "nama_panggilan" => "Zoe",
            "nomor_absen" => "33",
            "email" => "zoe@gmail.com",
            "no_telp" => "081500000000",
            "jk" => "Laki-Laki",
            "password" => "phdgsfTYtdh",
        ]);

    }
}
