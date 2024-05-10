<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KotaModel extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_kota';
    protected $primaryKey = 'id_kota';
    protected $fillable = [
        'judul', 
        'nim_satu', 
        'nama_mahasiswa_satu',
        'nim_dua', 
        'nama_mahasiswa_dua', 
        'nim_tiga', 
        'nama_mahasiswa_tiga', 
        'nip_satu', 
        'pembimbing_satu', 
        'nip_dua', 
        'pembimbing_dua', 
        'kelas', 
        'periode', 
        'tahapan_progres', 
        // 'jumlah_bimbingan', 
        // 'jumlah_artefak',
    ];

    public function getKota($id = null)
    {
        if ($id === null) {
            return DB::table($this->table)->get();
        } else {
            return DB::table($this->table)->where('id_kota', $id)->first();
        }
    }
}
