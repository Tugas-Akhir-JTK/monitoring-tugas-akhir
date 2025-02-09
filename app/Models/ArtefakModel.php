<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtefakModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_artefak';
    protected $fillable = [
        'periode_id',
        'timeline_utama_id',
        'nama_artefak',
        'deskripsi_artefak',
        'kategori_artefak',
        'tenggat_waktu'
    ];

    public function periode () {
        return $this->belongsTo(PeriodeModel::class);
    }

    public function timelineUtama () {
        return $this->belongsTo(TimelineUtamaModel::class);
    }
}
