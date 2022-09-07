<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\RuangKelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = RuangKelas::where('id_user', '=', Auth::user()->id)->paginate(5)->withQueryString();
        foreach($data as $item) {
            $jml_siswa = Siswa::where('id_kelas', '=', $item->id)->get()->count();
            $item['jml_siswa'] = $jml_siswa;
        }
            
        return view('daftarKelas.daftar_kelas', ['data'=>$data]);
    }

    public function search(Request $request)
    {
        // menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data = RuangKelas::latest()
		->where('nama_kelas','like',"%".$search."%")
		->orWhere('wali_kelas', 'like', "%".$search."%")->paginate(5)->withQueryString();

        foreach($data as $item) {
            $jml_siswa = Siswa::where('id_kelas', '=', $item->id)->get()->count();
            $item['jml_siswa'] = $jml_siswa;
        }
 
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

        // $data = $request->except('_token');
        // $data['id_user'] = Auth::user()->id;
        // RuangKelas::create($data);

            // dd(Auth::user()->id);
        RuangKelas::create([
            'id_user' => Auth::user()->id,
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas' => $request->wali_kelas
        ]);
        
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
        $info_kelas = RuangKelas::where('id','=',"$id_kelas")->first();
        $data = Siswa::where('id_kelas','=', "$id_kelas")->paginate(7)->withQueryString();
        return view('daftarKelas.isi_kelas', ['id_kelas'=>$info_kelas['id'], 
                                            'nama_kelas'=>$info_kelas['nama_kelas'],
                                            'wali_kelas'=>$info_kelas['wali_kelas'],
                                            'data'=>$data]);
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
        return redirect('/daftar_kelas')->with('successUpdate', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RuangKelas  $ruangKelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = RuangKelas::findOrFail($id);
        $isi_kelas = Siswa::where('id_kelas','=', $id);
        $jadwal_kelas = Jadwal::where('id_kelas','=',$id);
       
        $jadwal_kelas->delete(); 
        $isi_kelas->delete();
        $kelas->delete();
        return redirect()->back()->with('successDelete', 'Data berhasil dihapus');
    }
}
