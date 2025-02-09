<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_kota';
    protected $fillable = [
        'periode_id',
        'timeline_utama_id',
        'anggota1_id',
        'anggota2_id',
        'anggota3_id',
        'dospem1_id',
        'dospem2_id',
        'nama_kota',
        'judul_tugas_akhir',
        'metodologi_tugas_akhir',
        'luaran_tugas_akhir',
        'mitra_tugas_akhir'
    ];

    public function periode () {
        return $this->belongsTo(PeriodeModel::class);
    }

    public function timelineUtama () {
        return $this->belongsTo(TimelineUtamaModel::class);
    }
}
