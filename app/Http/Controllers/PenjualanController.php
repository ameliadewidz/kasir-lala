<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenjualanController extends Controller
{
    public function index() {
        // dd($data);
        
        $data = Penjualan::all();
        return view('transaction', ['data' => $data]);
    }

    public function addtransaction() {
        $data = Pelanggan::all();
        return view('addTransaction', ['data' => $data]);
    }

    public function inserttransaction(Request $request) {
        // dd($request->all());
        
        $request->validate([
            'penjualanID' => 'required',
            'tglPenjualan' => 'date',
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

        if (!$data) {
            return redirect()->route('transaction')->with('error', 'Transaction not found');
        }
    
        $pelangganData = Pelanggan::all(); // Ambil data pelanggan
        return view('editTransaction', compact('data', 'pelangganData'));
    }

    public function updatetransaction(Request $request, $id) {
        $data = Penjualan::find($id);

        $data->update($request->all());

        return redirect()->route('transaction')->with('success', 'Transaction updated successfully!');
    }

    public function deletetransaction($id) {
        $data = Penjualan::find($id);

        if (!$data) {
            return redirect()->route('transaction')->with('error', 'Transaction not found');
        }
    
        $data->delete();
    
        return redirect()->route('transaction')->with('success', 'Transaction deleted successfully!');
    }
}
