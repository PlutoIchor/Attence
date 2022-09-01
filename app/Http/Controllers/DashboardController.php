<?php

namespace App\Http\Controllers;

use App\Models\RuangKelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $jml_kelas = $user->classes->count();

        $jml_siswa = 0;
        foreach($user->classes as $class)
        {
            $jml_siswa += $class->students->count();
        }
        
        return view('dashboard', ['jml_kelas'=>$jml_kelas, 'jml_siswa'=>$jml_siswa]);
    }
}
