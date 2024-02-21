<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function form() {
        return view('register');
    }

    public function save(Request $req) {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|in:pelanggan,petugas',
        ]);

        User::create([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => bcrypt($req->input('password')),
            'role' => $req->input('role'),
        ]);

        // set flash message
        Session::flash('success', 'Registered Successfully!');

        // kalau berhasil arahkan ke halaman login
        return redirect()->route('login');
    }
}
