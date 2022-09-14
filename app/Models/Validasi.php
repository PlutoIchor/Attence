<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    use HasFactory;

    protected $table = "validasi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_kelas',
        'id_siswa',
        'id_mapel',
        'keterangan',
        'lampiran'
    ];

    public function student()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function schedule()
    {
        return $this->belongsTo(Jadwal::class, 'id_mapel');
    }
}
