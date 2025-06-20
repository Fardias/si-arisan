<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';
    protected $fillable = [
        'nama',
        'no_hp',
        'status_keikutsertaan',
        'tanggal_bergabung',
    ];

    public function transaksi()
    {
        return $this->hasMany(TransaksiArisan::class);
    }
}
