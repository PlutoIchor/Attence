<?php

namespace App\Http\Controllers;

use App\Models\RuangKelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class RuangKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RuangKelas::all();
        return view('daftarKelas.daftar_kelas', ['data'=>$data]);
    }

    public function search(Request $request)
    {
        // menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data = RuangKelas::latest()
		->where('nama_kelas','like',"%".$search."%")
		->orWhere('wali_kelas', 'like', "%".$search."%");
 
    		// mengirim data pegawai ke view index
		return view('daftarKelas.daftar_kelas', ['data'=>$data]);
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
        ]);

        $data = $request->except('_token');
        RuangKelas::insert($data);

        return redirect('/daftar_kelas')->with('successAdd', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RuangKelas  $ruangKelas
     * @return \Illuminate\Http\Response
     */
    public function show(RuangKelas $ruangKelas, $id_kelas)
    {
        $nama_kelas = RuangKelas::select('nama_kelas')->take(1)->where('id_kelas','like',"$id_kelas")->get();
        $data = Siswa::where('id_kelas','LIKE', "$id_kelas")->get();
        return view('daftarKelas.isi_kelas', ['nama_kelas'=>$nama_kelas, 'data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RuangKelas  $ruangKelas
     * @return \Illuminate\Http\Response
     */
    public function edit(RuangKelas $ruangKelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RuangKelas  $ruangKelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RuangKelas $ruangKelas, $id)
    {
        $item = RuangKelas::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect('/daftar_kelas')->with('successUpdate', 'Data berhasil diubah');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RuangKelas  $ruangKelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RuangKelas::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
