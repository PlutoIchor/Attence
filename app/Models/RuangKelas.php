<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;

    protected $table = "ruang_kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_kelas',
        'wali_kelas',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }

    public function schedules()
    {
        return $this->hasMany(Jadwal::class, 'id_kelas');
    }
}
