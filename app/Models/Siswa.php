<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswas";
    protected $primaryKey = "id_siswa";
    protected $fillable = [
        'NIS',
        'nama_lengkap',
        'nama_panggilan',
        'nomor_absen',
        'email',
        'no_telp',
        'jk',
    ];
}
