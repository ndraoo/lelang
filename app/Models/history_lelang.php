<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_lelang extends Model
{
    use HasFactory;
    protected $table = [
        'history_lelang'
    ];
    protected $guard = [
        'id_history'
    ];
}
