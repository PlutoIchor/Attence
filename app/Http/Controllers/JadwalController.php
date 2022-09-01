<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\RuangKelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_kelas)
    {
        $nama_kelas = RuangKelas::where('id', '=' , $id_kelas)->first('nama_kelas');
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jadwals = Jadwal::where('id_kelas', '=', $id_kelas)->get();

        return view('absen.jadwal_absen', ['nama_kelas' => $nama_kelas['nama_kelas'], 'hari' => $hari, 'id_kelas'=>$id_kelas,           'jadwals'=>$jadwals]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_kelas, $hari)
    {   
        Jadwal::create([
            'id_kelas' => $id_kelas,
            'hari' => $hari,
            'mapel' => $request->mapel,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir
        ]);

        return redirect('/jadwal_absen/'.$id_kelas)->with('successAdd', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelas, $id)
    {
        Jadwal::findOrFail($id)->update([
            'mapel' => $request->mapel,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir
        ]);
        
        return redirect('/jadwal_absen/'.$id_kelas)->with('successUpdate', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelas, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->back()->with('successDelete', 'Data berhasil dihapus');
    }
}
