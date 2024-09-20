<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'kode_barang',
        'nama_barang',
        'stok',
        'harga_barang',
        'kategori',
    ];
}
