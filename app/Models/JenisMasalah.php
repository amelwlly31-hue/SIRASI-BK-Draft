<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMasalah extends Model
{
    use HasFactory;

    protected $table = 'jenis_masalah';

    protected $primaryKey = 'id_jenis';

    protected $fillable = [
        'nama_jenis',
        'keterangan',
    ];

    public function konseling()
    {
        return $this->hasMany(Konseling::class, 'id_jenis', 'id_jenis');
    }
}
