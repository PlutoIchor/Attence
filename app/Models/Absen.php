<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = "absen";
    protected $primaryKey = "id";
    protected $fillable = [
        'keterangan'
    ];

    public function student()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function classroom()
    {
        return $this->belongsTo(RuangKelas::class);
    }
}
