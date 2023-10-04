<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lelang extends Model
{
    use HasFactory;
    protected $table = 'lelangs';
    protected $primaryKey = 'id_lelang';
    protected $casts = [
        'tanggal_lelang' => 'datetime',
    ];

    protected $fillable = [
        'id_barang', 'tanggal_lelang', 'harga_akhir', 'id_user','status'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class, 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
   public function penawaran()
   {
       return $this->hasMany(Penawaran::class, 'id_lelang');
   }

}
