<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtefakTerkumpulModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_artefak_terkumpul';
    protected $fillable = [
        'artefak_id',
        'kota_id',
        'file_name',
        'file_path',
        'tanggal_pengumpulan',
        'status_pengumpulan'
    ];
}
