<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = "absens";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_kelas',
        'id_siswa',
        'id_mapel',
        'keterangan'
    ];

    public function student()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Jadwal::class, 'id_mapel');
    }

    public function classroom()
    {
        return $this->belongsTo(RuangKelas::class);
    }
}
