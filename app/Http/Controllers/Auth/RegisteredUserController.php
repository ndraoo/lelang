<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'telp' => 'required|string|max:14',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));
        return redirect('/');

        // return redirect(RouteServiceProvider::HOME);
    }
}
