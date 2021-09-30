<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanHarian extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_makanan_id', 'harga_jual','stock',
    ];

    public function namaMakanan() {
        return $this->belongsTo(MenuMakanan::class, 'menu_makanan_id');
    }
    public function hargaJual() {
        return $this->belongsTo(MenuMakanan::class, 'harga_jual');
    }
}
