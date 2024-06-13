<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKegiatanModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_jadwal_kegiatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_label',
        'nama_kegiatan', 
        'bulan',
        'minggu',
        'status',
    ];
}

