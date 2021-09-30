<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang', 'satuan_barang', 'stok',
    ];

    public function namaBarang() {
        return $this->belongsTo(BarangMasuk::class, 'nama_barang');
    }
}
