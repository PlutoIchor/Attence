<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;

    protected $table = "ruang_kelas";
    protected $primaryKey = "id_kelas";
    protected $fillable = [
        'nama_kelas',
        'wali_kelas'
    ];
}
