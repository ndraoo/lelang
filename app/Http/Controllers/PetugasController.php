<?php

namespace App\Http\Controllers;
use App\Models\barang;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        return view('sidebar');
    }
}
