<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuMakanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_makanan',
        'harga_penjual',
        'harga_jual',
        'nama_penjual_id',
        'nama_kategori_id',
    ];
}
