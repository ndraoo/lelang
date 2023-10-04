<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            $user = Auth::user();
            if ($user->level == 'admin') {
                $view = 'admin.barang.index';
            } elseif ($user->level == 'petugas') {
                $view = 'petugas.barang.index';
            }
            $barang = barang::latest()->paginate(10);

            $title = 'Hapus Barang!';
            $text = "Apakah kamu yakin ingin menghapusnya?";
            confirmDelete($title, $text);
            return view($view, compact('barang'))->with('i', (request()->input('page', 1) - 1) * 10);
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (Auth::user()->level == 'admin') {
            $view = 'admin.barang.create';
        } elseif (Auth::user()->level == 'petugas') {
            $view = 'petugas.barang.create';
        }
        return view($view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:100',
            'tanggal' => 'required|date',
            'harga_awal' => 'required|integer',
            'deskripsi' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('barang_foto', 'public');

        Barang::create([
            'nama_barang' => $validatedData['nama_barang'],
            'tanggal' => $validatedData['tanggal'],
            'harga_awal' => $validatedData['harga_awal'],
            'deskripsi' => $validatedData['deskripsi'],
            'foto' => $fotoPath,
        ]);

        if (Auth::user()->level == 'admin') {
            $view = 'admin.barang.index';
        } elseif (Auth::user()->level == 'petugas') {
            $view = 'petugas.barang.index';
        }

        return redirect()->route($view)->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::user()->level == 'admin') {
            $view = 'admin.barang.edit';
        } elseif (Auth::user()->level == 'petugas') {
            $view = 'petugas.barang.edit';
        }

        $barang = barang::findOrFail($id);
        return view($view, compact('barang'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:100',
            'tanggal' => 'required|date',
            'harga_awal' => 'required|integer',
            'deskripsi' => 'required|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Barang::findOrFail($id);

        // Jika ada foto yang diunggah, lakukan update
        if ($request->hasFile('foto')) {
            // Upload foto baru
            $fotoPath = $request->file('foto')->store('barang_foto', 'public');

            // Hapus foto lama (jika ada)
            Storage::disk('public')->delete($barang->foto);

            // Update data barang beserta foto
            $barang->update([
                'nama_barang' => $validatedData['nama_barang'],
                'tanggal' => $validatedData['tanggal'],
                'harga_awal' => $validatedData['harga_awal'],
                'deskripsi' => $validatedData['deskripsi'],
                'foto' => $fotoPath,
            ]);
        } else {
            // Update data barang tanpa mengganti foto
            $barang->update($validatedData);
        }
        if (Auth::user()->level == 'admin') {
            $view = 'admin.barang.index';
        } elseif (Auth::user()->level == 'petugas') {
            $view = 'petugas.barang.index';
        }
        return redirect()->route($view)->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = barang::find($id);
        $barang->delete();
        if (Auth::user()->level == 'admin') {
            $view = 'admin.barang.index';
        } elseif (Auth::user()->level == 'petugas') {
            $view = 'petugas.barang.index';
        }
        return redirect()->route($view)->with('success', 'Barang berhasil dihapus.');
    }
}
