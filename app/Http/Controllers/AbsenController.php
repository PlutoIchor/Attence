<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\RuangKelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function absenHariIni()
    {
        $dataKelas = RuangKelas::where('id_user', '=', Auth::user()->id)->get();
        $idId = [];
        foreach ($dataKelas as $kelas) {
            array_push($idId, $kelas['id']);
        }
        $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        // Hari ke-n minggu ini
        $wday = getdate()['wday'];

        $jadwalHariIni = Jadwal::whereIn('id_kelas', $idId)->where('hari', '=', $hari[$wday])->get();

        // Id kelas yang punya jadwal hari ini
        $idKelas = [];
        foreach ($jadwalHariIni as $jadwal) {
            array_push($idKelas, $jadwal->id_kelas);
        }
        // Menghapus id kelas yang duplikat
        $idKelas = array_unique($idKelas);
        $kelas = RuangKelas::whereIn('id', $idKelas)->get();

        return view('absen.data_absen', ['jadwalHariIni' => $jadwalHariIni, 'kelas' => $kelas]);
    }

    public function dataJadwalIni($id_kelas, $id_jadwal)
    {
        $mapel = Jadwal::where('id', '=', $id_jadwal)->first();
        $isi_kelas = RuangKelas::where('id', '=', $id_kelas)->first()->students;

        $idIdSiswa = [];
        // Mengambil semua id siswa didalam kelas
        foreach ($isi_kelas as $siswa) {
            array_push($idIdSiswa, $siswa->id);
        }


        $waktu_mulai = date('Y-m-d '.$mapel['waktu_mulai']);
        $waktu_berakhir = date('d-m-Y '.$mapel['waktu_berakhir']);
        $dataAbsen = Absen::whereIn('id_siswa', $idIdSiswa)
        // Cek kalau ada record absen siswa hari ini
            ->where('created_at','>=',$waktu_mulai,'AND','created_at','<=',$waktu_berakhir)
            ->get();

        return view("absen.absen_jadwal", ['isi_kelas' => $isi_kelas, 'data_absen' => $dataAbsen, 'mapel' => $mapel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mapel' => 'required',
            'waktu_mulai' => 'required',
            'waktu_berakhir' => 'required',
        ]);

        $data = $request->except('_token');
        Absen::insert($data);

        return redirect('/jadwal_absen')->with('successAdd', 'Jadwal berhasil dibuat!');
    }

    public function absenSekarang(Request $request, $id_mapel, $id_siswa)
    {
        $siswa = Siswa::where('id','=',$id_siswa)->first();
        Absen::create([
            'id_kelas' => $siswa->classroom->id,
            'id_siswa' => $id_siswa,
            'id_mapel' => $id_mapel,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/dashboardSiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
