<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Siswa;
use App\Models\Validasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $idId = [];
        $classes = $user->classes;

        foreach ($classes as $class) {
            array_push($idId, $class->id);
        }

        $validations = Validasi::whereIn('id_kelas', $idId)->get();
        return view('absen.validasi', ['validations' => $validations]);
    }

    public function absenSekarang(Request $request, $id_mapel, $id_siswa)
    {
        $siswa = Siswa::where('id', '=', $id_siswa)->first();
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'lampiran' => 'image|file',
        ]);

        if ($request->file('lampiran')) {
            $lampiran = $request->file('lampiran')->store('lampiranAbsen');
            Validasi::create([
                'id_kelas' => $siswa->classroom->id,
                'id_siswa' => $siswa->id,
                'id_mapel' => $id_mapel,
                'keterangan' => $request->keterangan,
                'lampiran' => $lampiran,
            ]);
        } else {
            Validasi::create([
                'id_kelas' => $siswa->classroom->id,
                'id_siswa' => $siswa->id,
                'id_mapel' => $id_mapel,
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect('/dashboardSiswa');
    }

    public function buatKehadiranSiswa($id_validasi)
    {
        $validasi = Validasi::where('id','=',$id_validasi);
        Absen::create([
            'id_kelas' => $validasi->id_kelas,
            'id_siswa' => $validasi->id_siswa,
            'id_mapel' => $validasi->id_mapel,
            'keterangan' => $validasi->keterangan,
            'created_at' => $validasi->created_at,
            'updated_at' => $validasi->updated_at,
        ]);

        $validasi->delete();

        return redirect('/data_validasi');
    }

    public function buatKeteranganSiswa($id_validasi)
    {
        $validasi = Validasi::where('id','=',$id_validasi);
        Absen::create([
            'id_kelas' => $validasi->id_kelas,
            'id_siswa' => $validasi->id_siswa,
            'id_mapel' => $validasi->id_mapel,
            'keterangan' => 'Alfa',
            'created_at' => $validasi->created_at,
            'updated_at' => $validasi->updated_at,
        ]);

        $validasi->delete();

        return redirect('/data_validasi');
    }
}
