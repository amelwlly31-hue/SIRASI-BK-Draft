<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    use HasFactory;

    protected $table = 'penjadwalan';

    protected $primaryKey = 'id_penjadwalan';

    protected $fillable = [
        'id_siswa',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'jenis_bimbingan',
        'catatan',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }
}
