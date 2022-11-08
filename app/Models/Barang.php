<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory;

    // Memasukan semua insert file kedalam database
    // protected $guarded = [];

    // Memasukan data 1-1
    // protected $fillable = ['kodebarang', 'namabarang', 'deskripsi', 'stokbarang', 'hargabarang'];
}
