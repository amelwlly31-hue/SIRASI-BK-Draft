<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa';

    public $timestamps = false;

    protected $fillable = [
        'nis',
        'nama_siswa',
        'jenis_kelamin',
        'id_kelas',
        'alamat',
        'no_telp',
        'status',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function konseling()
    {
        return $this->hasMany(Konseling::class, 'id_siswa', 'id_siswa');
    }

    public function penjadwalan()
    {
        return $this->hasMany(Penjadwalan::class, 'id_siswa', 'id_siswa');
    }
}
