<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_periode';
    protected $fillable = [
        'periode'
    ];

    public function artefak() {
        return $this->hasMany(ArtefakModel::class);
    }

    public function kota() {
        return $this->hasMany(KotaModel::class);
    }
}
