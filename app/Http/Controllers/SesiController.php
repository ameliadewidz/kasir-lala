<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SesiController extends Controller
{
    function index() {
        // mengarahkan ke tampilan login (view)
        return view('login');
    }
    function login(Request $request) {
        // melakukan pengecekan (validasi) pertama kali
        // bahwa form username dan password wajib diisi
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            // memberi peringatan
            'email.required' => 'Email required!',
            'password.required' => 'Password required!',
        ]);

    // pengecekan apabila username dan password sudah benar
    $infologin = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if(Auth::attempt($infologin)) {
        if(Auth::user()->role == 'admin') {
            return redirect('dashboard/admin');
        } else if(Auth::user()->role == 'petugas') {
            return redirect('dashboard/petugas');
        }
        
    } else {
        // mengembalikan ke halaman awal (menampilkan form login)
        return redirect('')->withErrors('Email and Password Incorrect!')->withInput();
        }
    }

    function logout() {
        Auth::logout();
        return redirect(''); // redirect ke halaman awal (login)
    }
}