<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'masyarakat') {
                return redirect()->intended('/');
            } elseif ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'petugas') {
                return redirect()->intended('petugas');
            }
        }
        return view('auth/login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == 'masyarakat') {
                    return redirect()->intended('/');
                } elseif ($user->level == 'admin') {
                    return redirect()->intended('admin');
                } elseif ($user->level == 'petugas') {
                    return redirect()->intended('petugas');
                }
                return redirect()->intended('/login');
            }

        return redirect('login')->withInput()->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request) {

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'telp' => 'required|string|max:14',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'nama_lengkap' => $request->petugas,
            'username' => $request->username,
            'telp' => 'required|string|max:14',
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan login dengan akun Anda.');
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }

}
