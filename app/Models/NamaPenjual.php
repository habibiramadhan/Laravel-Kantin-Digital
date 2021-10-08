<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaPenjual extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_penjual', 'jk', 'alamat', 'no_hp'
    ];
}
