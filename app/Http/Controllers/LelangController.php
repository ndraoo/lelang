<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\history;
use App\Models\barang;
use App\Models\lelang;

use App\Models\penawaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $lelang = lelang::with('barang')->latest()->get();
        $title = 'Hapus Pelelangan!';
        $text = "Apakah kamu yakin ingin menghapusnya?";
        confirmDelete($title, $text);

        return  view('admin/lelang/index' , compact('lelang'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = barang::latest()->get();
        return view('admin/lelang/create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'tanggal_lelang' => 'required|date',
        'id_barang' => 'required|exists:barangs,id', // Assuming the table name for barang is 'barangs'
    ]);

    $id_barang = $request->input('id_barang');

    // Check if the barang already has a lelang
    $existingLelang = lelang::where('id_barang', $id_barang)->first();
    if ($existingLelang) {
        return redirect()->back()->with('error', 'Barang sudah dilelangkan');
    }

    $lelang = new lelang();
    $lelang->tanggal_lelang = $request->input('tanggal_lelang');
    $lelang->id_barang = $id_barang;
    $lelang->harga_akhir = 0;
    $lelang->id_user = Auth::id();
    $lelang->status = 'ditutup';
    $lelang->save();

    return redirect()->route('admin.lelang.index')->with('success', 'Lelang berhasil ditambahkan');
    }

    public function toggleLelang(Request $request, $id_lelang)
    {
        // Ambil status dari permintaan AJAX
        $status = $request->input('status');

        // Temukan lelang berdasarkan ID
        $lelang = lelang::find($id_lelang);

        if (!$lelang) {
            return response()->json(['message' => 'Lelang tidak ditemukan'], 404);
        }
        // Validasi status (pastikan hanya 'Dibuka' atau 'Ditutup')
        if ($status != 'dibuka' && $status != 'ditutup') {
            return response()->json(['message' => 'Status tidak valid'], 400);
        }
        // Ubah status lelang
        $lelang->status = $status;
        $lelang->save();

        // Response sukses
        return response()->json(['message' => 'Status lelang berhasil diubah'], 200);
    }


        public function validateLelang($lelangId)
        {
        $lelang = lelang::find($lelangId);

        if (!$lelang) {
            return response()->json(['valid' => false, 'message' => 'Lelang tidak ditemukan'], 404);
        }

        $tanggalLelang = Carbon::parse($lelang->tanggal_lelang);
        $sekarang = Carbon::now();

        if ($sekarang->gt($tanggalLelang)) {
            if ($lelang->status == 'ditutup') {
                return response()->json(['valid' => false, 'message' => 'Lelang telah ditutup. Anda tidak dapat membuka lelang yang sudah ditutup.'], 400);
            } else {
                // Tandai lelang sebagai ditutup jika sudah lewat tanggal lelang
                $lelang->status = 'ditutup';
                $lelang->save();
                return response()->json(['valid' => true, 'message' => 'Validasi berhasil. Anda dapat membuka lelang.']);
            }
        }

        return response()->json(['valid' => true, 'message' => 'Validasi berhasil. Anda dapat membuka lelang.']);
        }
    /**
     * Display the specified resource.
     */
    public function showPilihPemenangForm($id_lelang)
    {
        $lelang = Lelang::find($id_lelang);

        if (!$lelang) {
            return redirect()->back()->with('error', 'Lelang tidak ditemukan');
        }

        // Periksa apakah lelang sudah ditutup
        if ($lelang->status !== 'ditutup') {
            return redirect()->back()->with('error', 'Lelang belum ditutup. Anda tidak dapat memilih pemenang saat ini.');
        }
        $pemenangTertinggi = Penawaran::where('id_lelang', $lelang->id_lelang)
        ->orderBy('harga_akhir', 'desc')
        ->first();

        if (!$pemenangTertinggi) {
            return redirect()->back()->with('error', 'Tidak ada penawaran untuk lelang ini.');
        }

        // Update harga akhir di tabel Lelang
        Lelang::where('id_lelang', $lelang->id_lelang)
            ->update(['harga_akhir' => $pemenangTertinggi->harga_akhir]);

        return view('admin.lelang.show', compact('lelang', 'pemenangTertinggi'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_lelang)
    {

    }

    public function update(Request $request, lelang $lelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_lelang)
    {
        $lelang = lelang::find($id_lelang);
        $lelang->delete($id_lelang);
        return redirect()->route('admin.lelang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
