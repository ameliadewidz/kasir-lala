<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans';

    protected $primaryKey = 'penjualanID';

    protected $fillable = [
        'penjualanID',
        'tglPenjualan',
        'totalHarga',
        'pelangganID',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelangganID');
    }
}