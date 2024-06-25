<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ResumeBimbinganModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_resume_bimbingan';
    protected $primaryKey = 'id_resume_bimbingan';
    protected $fillable = [
        'id_resume_bimbingan',
        'tanggal_bimbingan',
        'waktu_bimbingan',
        'isi_resume_bimbingan',
        'isi_revisi_bimbingan',
        'progres_pengerjaan',
        'tahapan_progres',
        'sesi_bimbingan',
    ];

    public function getResume($id = null)
    {
        if ($id === null) {
            return DB::table($this->table)->get();
        } else {
            return DB::table($this->table)->where('id_resume_bimbingan', $id)->first();
        }
    }
}
