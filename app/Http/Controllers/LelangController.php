<?php

namespace App\Http\Controllers;

use App\Models\lelang;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lelang = lelang::with('baramg')->get();
        return  view('')
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(lelang $lelang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lelang $lelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lelang $lelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lelang $lelang)
    {
        //
    }
}
