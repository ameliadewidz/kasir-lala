<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenjualanController extends Controller
{
    public function index() {
        // $data = Pelanggan::all();
        // //dd($data);
        // return view('transaction', compact('data'));

        $data = Pelanggan::all();
        // dd($data); // Cek apakah data pelanggans diambil dengan benar
        return view('transaction', ['data' => $data]);
    }

    public function addtransaction() {
        return view('transaction');
    }

    public function inserttransaction(Request $request) {
        // dd($request->all());
        
        $request->validate([
            'penjualanID' => 'required',
            'date' => 'required|date',
            'totalHarga' => 'required|integer',
            'pelangganID' => 'required|exists:pelanggans,pelangganID',
        ]);
    
        Penjualan::create($request->all());
        
        Session::flash('success', 'Transaction done successfully!');

        return redirect()->route('transaction');
    }

    public function viewtransaction($id) {
        $data = Penjualan::find($id);
        // dd($data);

        return view('editTransaction', compact('data'));
    }
}
