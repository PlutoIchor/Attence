<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\RuangKelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_siswa)
    {
        $data = Siswa::where('id', '=', $id_siswa)->first();
        return view('daftarSiswa.informasi_siswa', ['data' => $data]);
    }

    public function search(Request $request, $id_kelas)
    {
        $search = $request->search;

        $info_kelas = RuangKelas::where('id', '=', "$id_kelas")->first();
        $data = Siswa::latest()->where('id_kelas', '=', "$id_kelas")
            ->where('nama_lengkap', 'like', "%" . $search . "%")
            ->orWhere('nis', 'like', "%" . $search . "%")
            ->orWhere('nomor_absen', 'like', "%" . $search . "%")->paginate(7)->withQueryString();

        return view('daftarKelas.isi_kelas', [
            'id_kelas' => $info_kelas['id'],
            'nama_kelas' => $info_kelas['nama_kelas'],
            'wali_kelas' => $info_kelas['wali_kelas'],
            'data' => $data
        ]);
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

    public function pageTambahSiswa($id_kelas)
    {
        return view('daftarSiswa.form_tambah_siswa', ['id_kelas' => $id_kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_kelas)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nomor_absen' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'email' => 'required|email|unique:siswas,email',
            'nomor_absen' => 'required',
            'jk' => 'required',
        ]);
        // Generate Random Password
        $password = Str::random(10);

        Siswa::create([
            'id_kelas' => $id_kelas,
            'NIS' => $request->nis,
            'nomor_absen' => $request->nomor_absen,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'jk' => $request->jk,
            'password' => $password
        ]);

        $user = User::create([
            'username' => $request->nama_panggilan,
            'email' => $request->email,
            'phone_number' => $request->no_telp,
            'password' => Hash::make($password),
        ]);

        $user->assignRole('siswa');

        return redirect('/isi_kelas/' . $id_kelas)->with('successAdd', 'Data berhasil disimpan');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $data_siswa = Siswa::where('email', '=', $user->email)->first();

        $idKelas = RuangKelas::where('id','=',$data_siswa->id_kelas)->first()->id;
        
        $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        // Hari ke-n minggu ini
        $wday = getdate()['wday'];

        $jadwalHariIni = Jadwal::where('id_kelas','=',$idKelas)->where('hari', '=', $hari[$wday])->get();       

        return view('siswa.dashboard', ['data_siswa' => $data_siswa, 'jadwalHariIni' => $jadwalHariIni]);
    }

    public function profil()
    {
        $user = Auth::user();
        $siswa = Siswa::where('email','=',$user->email)->first();
        
        return view('siswa.profil', ['siswa' => $siswa, 'user' => $user]);
    }

    public function ubahNamaPanggilan(Request $request)
    {
        $siswa = Siswa::where('email','=',Auth::user()->email)->first();
        $siswa->update(array('nama_panggilan' => $request->nama_panggilan));

        return redirect('profilSiswa')->with('success', 'Nama panggilanmu berhasil diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
