<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthPetugasController extends Controller
{
    public function index()
    {
        $admin = User::where('level', 'petugas')
                ->latest()
                ->paginate(10);
        return view('admin/petugas/index', compact('admin'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create()
    {
        return view('admin/petugas/register');
    }
    public function store(request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|in:petugas',
        ]);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => $request->password,
            'level' => $request->level,
            'telp' => 0,
        ]);

        return redirect()->route('admin/petugas/index')->with('success', 'Registrasi berhasil! Silahkan login dengan akun Anda.');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }
    public function update(request $request,$id)
    {
    $petugas = User::findOrFail($id);

    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,'.$id,
        'password' => 'nullable|string|min:6|confirmed',
        'level' => 'required|in:petugas',
    ]);

    $petugas->nama_lengkap = $request->nama_lengkap;
    $petugas->username = $request->username;
    if ($request->has('password')) {
        $petugas->password = $request->password;
    }
    $petugas->level = $request->level;
    $petugas->save($id);

    return redirect()->route('admin.petugas.index')->with('success', 'Data petugas berhasil diperbarui.');
    }
    public function destroyer($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect()->route('admin.petugas.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
