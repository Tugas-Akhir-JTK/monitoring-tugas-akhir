<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineKotaModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_timeline_kota';
    protected $fillable = [
        'kota_id',
        'timeline_utama_id',
        'nama_timeline',
        'status',
        'tanggal_mulai',
        'tanggal_selesai'
    ];
}