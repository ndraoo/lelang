<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $tabel = [
    'barangs'
    ];
    protected $primaryKey = 'id';
    protected $casts = [
        'tanggal' => 'datetime',
    ];

    protected $fillable = [
    'nama_barang','foto', 'tanggal', 'harga_awal', 'deskripsi'
    ];

    public function lelang()
    {
        return $this->belongsTo(lelang::class, 'id');
    }
}
