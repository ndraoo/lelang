<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemenang extends Model
{
    use HasFactory;
    protected $table = 'pemenangs';
    protected $primaryKey = 'id';
    protected $casts = [
        'tanggal_pemenang' => 'datetime',
    ];

    protected $fillable = [
       'id_lelang' ,'id_user','harga_akhir', 'tanggal_pemenang'
    ];




    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
