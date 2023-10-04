<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penawaran extends Model
{
    use HasFactory;
    protected $table = 'penawarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user', 'id_lelang', 'harga_akhir'
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
