<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaHasArterfakModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_kota_has_artefak';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kota_user', 
        'id_artefak',
        'file_pengumpulan'
    ];
}
