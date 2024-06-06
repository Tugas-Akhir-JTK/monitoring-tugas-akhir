<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_event', 'tanggal_mulai', 'tanggal_selesai', 'deskripsi'
    ];

    public function getevent($id = null)
    {
        if ($id === null) {
            return DB::table($this->table)->get();
        } else {
            return DB::table($this->table)->where('id', $id)->first();
        }
    }
}
