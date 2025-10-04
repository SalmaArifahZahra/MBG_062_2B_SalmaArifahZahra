<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = 'permintaan';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'pemohon_id',
        'tgl_masak',
        'menu_makan',
        'jumlah_porsi',
        'status',
        'created_at'
    ];
}
