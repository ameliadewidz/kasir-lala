<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DetailController extends Controller
{
    public function index() {
        $data = DetailPenjualan::all();
        return view('detail', ['data' => $data]);

        // $data = DetailPenjualan::all();
        // return view('detail', ['data' => $data]);
    }

    public function adddetail() {
        $produk = Produk::all();
        $penjualan = Penjualan::all();

        $produkID = request('produkID');
        $p_detail = Produk::find($produkID);

        $act = request('act');
        $qty = request('qty');
        if ($act == 'min') {
            if ($qty <= 1) {
                $qty = 1;
            } else {
                $qty = $qty - 1;
            }
        } else {
            $qty = $qty + 1;
        }

        $subtotal = 0;
        if($p_detail) {
            $subtotal = $qty * $p_detail->harga;
        }

        $data = [
            'p_detail' => $p_detail,
            'produk' => $produk,
            'qty' => $qty,
            'subtotal' => $subtotal,
            'penjualan' => $penjualan,  
        ];

        return view('addDetail', $data);
    }

    public function insertdetail(Request $request) {

        $data = [
            'detailID' => $request->detailID,
            'penjualanID' => $request->penjualanID,
            'produkID' => $request->produkID,
            'jumlahProduk' => $request->jumlahProduk,
            'subTotal' => $request->subTotal,
        ];
        
        DetailPenjualan::create($data);

        Session::flash('success', 'Transaction added successfully!');

        return redirect()->route('detail');
    }
    public function viewdetail($id) {
        $data = DetailPenjualan::find($id);

        if (!$data) {
            return redirect()->route('detail')->with('error', 'Transaction not found');
        }

        //dd($data);

        $produkData = Produk::all(); // Ambil data produk
        $penjualanData = Penjualan::all(); // Ambil data produk

        $produkID = request('produkID');
        $p_detail = Produk::find($produkID);

        $qty = $data->jumlahProduk;
        $act = request('act');
        $qty = request('qty');
        if ($act == 'min') {
            if ($qty <= 1) {
                $qty = 1;
            } else {
                $qty = $qty - 1;
            }
        } else {
            $qty = $qty + 1;
        }

        $subtotal = 0;
        if($p_detail) {
            $subtotal = $qty * $p_detail->harga;
        }

        $produkID = request('produkID');
        $p_detail = Produk::find($produkID);

        return view('editDetail', compact
        (
            'data', 
            'produkData',
            'penjualanData',
            'qty',
            'subtotal',
            'p_detail',
        ));
    }

    public function updatedetail(Request $request, $id) {
        $data = DetailPenjualan::find($id);

        $data->update($request->all());

        return redirect()->route('detail')->with('success', 'Transaction updated successfully!');
        
    }

    public function deletedetail($id) {
        $data = DetailPenjualan::find($id);

        if (!$data) {
            return redirect()->route('detail')->with('error', 'Transaction not found');
        }
    
        $data->delete();
    
        return redirect()->route('detail')->with('success', 'Transaction deleted successfully!');
    }
}
