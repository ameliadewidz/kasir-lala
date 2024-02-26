<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualans';

    protected $primaryKey = 'detailID';

    protected $fillable = [
        'detailID',
        'penjualanID',
        'produkID',
        'jumlahProduk',
        'subTotal',
    ];

    public function produk() 
    {
        return $this->belongsTo(Produk::class, 'produkID');
    }
}