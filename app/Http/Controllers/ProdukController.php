<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    public function index() {
        $data = Produk::all();
        return view('product', compact('data'));
    }

    public function addproduct() {
        return view('addProduct');
    }

    public function insertproduct(Request $request) {
        // dd($request->all());
        
        $request->validate([
            'produkID' => 'required|integer',
            'namaProduk' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);
    
        Produk::create($request->all());
        
        Session::flash('success', 'Product added successfully!');

        return redirect()->route('product');
    }

    public function viewproduct($id) {
        $data = Produk::find($id);
        // dd($data);

        return view('editProduct', compact('data'));
    }

    public function updateproduct(Request $request, $id) {
        $data = Produk::find($id);

        $data->update($request->all());

        return redirect()->route('product')->with('success', 'Product updated successfully!');;
    }

    public function delete($id) {
        $data = Produk::find($id);

        if (!$data) {
            return redirect()->route('product')->with('error', 'Product not found');
        }
    
        $data->delete();
    
        return redirect()->route('product')->with('success', 'Product deleted successfully!');
    }
}