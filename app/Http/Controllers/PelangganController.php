<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    public function index() {
        $data = Pelanggan::all();
        return view('customer', compact('data'));
    }

    public function addcust() {
        return view('addCust');
    }

    public function insertcust(Request $request) {
        $request->validate([
            'pelangganID' => 'required|integer',
            'namaPelanggan' => 'required|string',
            'alamat' => 'required|string',
            'nomorTelp' => 'required|integer',
        ]);
    
        Pelanggan::create($request->all());
        
        Session::flash('success', 'Customer added successfully!');

        return redirect()->route('customer');
    }

    public function viewcust($id) {
        $data = Pelanggan::find($id);
        // dd($data);

        return view('editCust', compact('data'));
    }

    public function updatecust(Request $request, $id) {
        $data = Pelanggan::find($id);

        $data->update($request->all());

        return redirect()->route('customer')->with('success', 'Customer updated successfully!');;
    }

    public function deletecust($id) {
        $data = Pelanggan::find($id);

        if (!$data) {
            return redirect()->route('customer')->with('error', 'Customer not found');
        }
    
        $data->delete();
    
        return redirect()->route('customer')->with('success', 'Customer deleted successfully!');
    }
}