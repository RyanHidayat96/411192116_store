<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'kode_barang' => 'BRG002',
            'nama_barang' => 'Pulpen Biru Faster',
            'deskripsi' => 'Peralatan ATK Kantor',
            'stok_barang' => '50',
            'harga_barang' => '12000',
        ]);
    }
}
