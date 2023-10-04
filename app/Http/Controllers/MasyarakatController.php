<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use App\Models\penawaran;
use App\Models\lelang;
use App\Models\history;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    public function index()
    {
    return view('masyarakat');
    }

    public function indexPelelangan()
    {
        $lelang = lelang::with('barang')->latest()->get();

        return  view('masyarakat.pelelangan' , compact('lelang'))->with('i');
    }

    public function createPenawaran($id_lelang)
    {
        $lelang = Lelang::find($id_lelang);
        $history = Penawaran::where('id_lelang', $id_lelang)->get();

        if (!$lelang) {
            return redirect()->back()->with('error', 'Lelang tidak ditemukan');
        }

        $barang = $lelang->barang;
        $tanggalLelang = $lelang->tanggal_lelang;

        $id_pengguna = Auth::id(); // ID pengguna saat ini

        $hargaPenawaranUser = Penawaran::where('id_user', $id_pengguna)
            ->where('id_lelang', $id_lelang)
            ->max('harga_akhir');

        $hargaPenawaranTertinggiLainnya = [];

        $id_pengguna_lain = Penawaran::where('id_lelang', $id_lelang)
            ->where('id_user', '!=', $id_pengguna)
            ->distinct()
            ->pluck('id_user');

        foreach ($id_pengguna_lain as $id_user) {
            $username = User::where('id', $id_user)->value('username');
            $hargaPenawaranTertinggiLain = Penawaran::where('id_lelang', $id_lelang)
                ->where('id_user', $id_user)
                ->max('harga_akhir');

            // Jika pengguna saat ini menginput penawaran yang lebih tinggi, perbarui hargaPenawaranTertinggiLain
            if ($hargaPenawaranUser > 0 && $hargaPenawaranUser > $hargaPenawaranTertinggiLain) {
                $hargaPenawaranTertinggiLain = $hargaPenawaranUser;
                $username = Auth::user()->username;
            }

            $hargaPenawaranTertinggiLainnya[$username] = $hargaPenawaranTertinggiLain;
        }

        $hargaPenawaranTertinggi = Penawaran::where('id_lelang', $id_lelang)
            ->max('harga_akhir');

        return view('masyarakat.show', compact('barang', 'history','id_lelang', 'tanggalLelang', 'hargaPenawaranUser', 'hargaPenawaranTertinggi', 'hargaPenawaranTertinggiLainnya'))->with('i');
    }

        public function tambahPenawaran(Request $request, $id_lelang)
        {
            $lelang = lelang::find($id_lelang);

            if (!$lelang) {
                return redirect()->back()->with('error', 'Lelang tidak ditemukan');
            }

            // Periksa apakah lelang sudah ditutup
            if ($lelang->status !== 'dibuka') {
                return redirect()->back()->with('error', 'Lelang belum dibuka. Anda tidak dapat menawar saat ini.');
            }

            // Periksa apakah tanggal lelang telah lewat
            $tanggalLelang = Carbon::parse($lelang->tanggal_lelang);
            $sekarang = Carbon::now();

            if ($sekarang->gt($tanggalLelang)) {
                $penawaranTertinggi = $lelang->lelang->max('harga_akhir') ?? 0;
                $lelang->status = 'ditutup';
                return redirect()->back()->with('error', 'Tanggal lelang telah lewat. Anda tidak dapat menawar saat ini.');
            }
            $penawaranTertinggi = 0; // Nilai default
            $jumlahPenawaran = $request->input('harga_akhir');

            if ($lelang->lelang) {
                $penawaranTertinggi = $lelang->lelang->max('harga_akhir') ?? 0;
            }
            $hargaAwal = $lelang->barang->harga_awal;

            if ($jumlahPenawaran <= $hargaAwal) {
                return redirect()->back()->with('error', 'Penawaran harus lebih tinggi dari harga awal.');
            }

            if ($jumlahPenawaran > $penawaranTertinggi) {
                $newPenawaran = new penawaran();
                $newPenawaran->id_user = Auth::id();
                $newPenawaran->harga_akhir = $jumlahPenawaran;
                $newPenawaran->id_lelang = $lelang->id_lelang;
                $newPenawaran->save();

                return redirect()->back()->with('success', 'Penawaran Anda Berhasil!');
            } else {
                return redirect()->back()->with('error', 'Penawaran Anda tidak lebih tinggi dari yang sudah ada.');
            }
        }
        public function indexPemenang()
        {
            $lelang = lelang::with('barang')
            ->where('status', 'ditutup')
            ->latest()->get();
            return  view('masyarakat/pemenang' , compact('lelang'))->with('i');
        }
        public function pemenang($id_lelang)
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

            return view('masyarakat.pemenang2', compact('lelang', 'pemenangTertinggi'));
        }

}
