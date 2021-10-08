<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang', 'tanggal'
    ];
    public function barang()
    {
        return $this->hasMany(Barang::class, 'nama_barang');
    }
}
