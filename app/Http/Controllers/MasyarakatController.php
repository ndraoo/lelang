<?php

namespace App\Http\Controllers;
use App\Models\barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasyarakatController extends Controller
{
    public function index()
    {
    $barang = barang::latest()->get();
    return view('welcome', compact('barang'));
    }
}
