<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiArisan extends Model
{
    //
    protected $table = 'transaksi_arisans';
    protected $fillable = [
        'anggota_id',
        'periode',
        'total_setoran',
        'status_sudah_lunas',
        'status_menang_arisan',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
