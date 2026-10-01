<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakLanjut extends Model
{
    use HasFactory;

    protected $table = 'tindak_lanjut';

    protected $primaryKey = 'id_tindak_lanjut';

    public $timestamps = false;

    protected $fillable = [
        'id_konseling',
        'tanggal',
        'tindakan',
        'keterangan',
    ];

    public function konseling()
    {
        return $this->belongsTo(Konseling::class, 'id_konseling', 'id_konseling');
    }
}
