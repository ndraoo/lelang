<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lelang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang', 'tanggal_lelang', 'harga_akhir', 'id_user', 'status'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
