<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Nama tabel yang digunakan oleh model

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'nama_produk', 
        'deskripsi_produk', 
        'harga_produk', 
        'stok_produk',
    ];
}