<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPengujiModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_jadwal_penguji';
    protected $fillable = [
        'kota_id',
        'timeline_utama_id',
        'dospem_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'status'
    ];
}
