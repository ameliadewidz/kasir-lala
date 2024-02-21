<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index() {
        $data = User::all();
        return view('user', compact('data'));
    }

    public function adduser() {
        return view('addUser');
    }

    public function insertuser(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|in:pelanggan,petugas,admin',
        ]);
    
        User::create($request->all());
        
        Session::flash('success', 'User added successfully!');

        return redirect()->route('user');
    }

    public function viewuser($id) {
        $data = User::find($id);
        // dd($data);

        return view('editUser', compact('data'));
    }

    public function updateuser(Request $request, $id) {
        $data = User::find($id);

        $data->update($request->all());

        return redirect()->route('user')->with('success', 'User updated successfully!');
    }

    public function deleteuser($id) {
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('user')->with('error', 'User not found');
        }
    
        $data->delete();
    
        return redirect()->route('user')->with('success', 'User deleted successfully!');
    }
}