<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;

    protected $table = 'konseling';

    protected $primaryKey = 'id_konseling';

    public $timestamps = false;

    protected $fillable = [
        'id_siswa',
        'id_jenis',
        'tanggal',
        'masalah',
        'hasil_konseling',
        'catatan',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function jenisMasalah()
    {
        return $this->belongsTo(JenisMasalah::class, 'id_jenis', 'id_jenis');
    }

    public function tindakLanjut()
    {
        return $this->hasMany(TindakLanjut::class, 'id_konseling', 'id_konseling');
    }


}
