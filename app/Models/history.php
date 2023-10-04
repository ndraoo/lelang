<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history    extends Model
{
    use HasFactory;
    protected $table = [
        'history_lelang'
    ];
    protected $guard = [
        'id_history'
    ];
    protected $fillable = [
        'id_lelang',
        'id_barang',
        'id_user',
        'penawaran_harga',
    ];

    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
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
