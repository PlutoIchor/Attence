<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswas";
    protected $primaryKey = "id";
    protected $fillable = [
        'NIS',
        'nama_lengkap',
        'nama_panggilan',
        'nomor_absen',
        'email',
        'no_telp',
        'jk',
        'password',
        'id_kelas'
    ];

    public function classroom()
    {
        return $this->belongsTo(RuangKelas::class, 'id_kelas');
    }

    public function attendances()
    {
        return $this->hasMany(Absen::class, 'id_siswa');
    }
}
