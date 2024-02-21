<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $primaryKey = 'produkID';
    
    protected $fillable = [
        'produkID',
        'namaProduk',
        'harga',
        'stok',
    ];
    // public function detailpenjualan() {
    //     return $this->hasOne('App\DetailPenjualan');
    // }
}
