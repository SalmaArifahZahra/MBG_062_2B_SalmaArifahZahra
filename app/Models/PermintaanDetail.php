<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanDetail extends Model
{
    protected $table = 'permintaan_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'permintaan_id',
        'bahan_id',
        'jumlah_diminta'
    ];

    public function bahan()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_id');
    }
}
