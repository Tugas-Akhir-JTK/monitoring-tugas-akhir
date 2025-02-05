<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_resume';
    protected $fillable = [
        'kota_id',
        'timeline_utama_id',
        'dospem_id',
        'sesi_bimbingan',
        'tanggal_bimbingan',
        'jam_mulai',
        'jam_selesai',
        'isi_resume_bimbingan',
        'isi_revisi_bimbingan'
    ];
}