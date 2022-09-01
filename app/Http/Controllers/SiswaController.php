<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\RuangKelas;
use Illuminate\Http\Request;
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
        return view('daftarSiswa.informasi_siswa', ['data'=>$data]);
    }

    public function search(Request $request ,$id_kelas)
    {
		$search = $request->search;
 
        $info_kelas = RuangKelas::where('id','=',"$id_kelas")->first();
		$data = Siswa::latest()->where('id_kelas','=', "$id_kelas")
		->where('nama_lengkap','like',"%".$search."%")
		->orWhere('nis', 'like', "%".$search."%")
        ->orWhere('nomor_absen', 'like', "%".$search."%")->paginate(7)->withQueryString();
 
        return view('daftarKelas.isi_kelas', ['id_kelas'=>$info_kelas['id'], 
                                            'nama_kelas'=>$info_kelas['nama_kelas'],
                                            'wali_kelas'=>$info_kelas['wali_kelas'],
                                            'data'=>$data]);
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
        return view('daftarSiswa.form_tambah_siswa', ['id_kelas'=>$id_kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_kelas)
    {
        $this->validate($request,[
            'nis' => 'required',
            'nomor_absen' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'email' => 'required',
            'nomor_absen' => 'required',
            'jk' => 'required',
        ]);


        Siswa::create([
            'id_kelas' => $id_kelas,
            'NIS' => $request->nis,
            'nomor_absen' => $request->nomor_absen,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'jk' => $request->jk,
            'password' => Str::random(10)
        ]);

        return redirect('/isi_kelas/'. $id_kelas)->with('successAdd', 'Data berhasil disimpan');
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
