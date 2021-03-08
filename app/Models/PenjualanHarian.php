<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanHarian extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_makanan_id',
        'stock',
    ];

    public function menuMakanan() {
        return $this->belongsTo(MenuMakanan::class, 'menu_makanan_id');
    }
}
