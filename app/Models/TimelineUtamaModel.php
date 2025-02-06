<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineUtamaModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_timeline_utama';
    protected $fillable = [
        'periode_id',
        'nama_timeline',
        'deskripsi_timeline',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    public function artefak() {
        return $this->hasMany(ArtefakModel::class);
    }

    public function kota() {
        return $this->hasMany(KotaModel::class);
    }
}
