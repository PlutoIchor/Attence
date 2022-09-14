<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = "jadwals";
    protected $primaryKey = "id";
    protected $fillable = [
        'hari',
        'mapel',
        'waktu_mulai',
        'waktu_berakhir',
        'id_kelas',
    ];

    public function classroom()
    {
        return $this->belongsTo(RuangKelas::class, 'id_kelas');
    }

    public function attendances()
    {
        return $this->hasMany(Absen::class, 'id_mapel');
    }

    public function validations()
    {
        return $this->hasMany(Validasi::class, 'id_mapel');
    }
}
