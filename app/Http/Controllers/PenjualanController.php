<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $data = DB::table('penjualans')
            ->where('jumlah_barang', '>', 10)
            ->orWhere('harga_barang', '>', 10000)
            ->get();
        return view('penjualan/penjualan', compact('data'));
    }

    public function tambahdatapenjualan()
    {
        return view('penjualan/tambahdatapenjualan');
    }

    public function insertdatapenjualan(Request $request)
    {
        // dd($request->all());
        $query = DB::table('penjualans')->insert([
            'no_penjualan' => $request->input('nopenjualan'),
            'tanggal' => $request->input('tanggal'),
            'kode_pelanggan' => $request->input('kodepelanggan'),
            'kode_barang' => $request->input('kodebarang'),
            'jumlah_barang' => $request->input('jumlahbarang'),
            'harga_barang' => $request->input('hargabarang')
        ]);

        if ($query) {
            return redirect()->route('penjualan');
        }
    }

    public function tampildatapenjualan($id)
    {
        $data = penjualan::find($id);
        // dd($data);

        return view('penjualan/tampildatapenjualan', compact('data'));
    }

    public function updatedatapenjualan(Request $request)
    {
        $query = DB::table('penjualans')
            ->where('id', $request->input('id'))
            ->update([
                'no_penjualan' => $request->input('nopenjualan'),
                'tanggal' => $request->input('tanggal'),
                'kode_pelanggan' => $request->input('kodepelanggan'),
                'kode_barang' => $request->input('kodebarang'),
                'jumlah_barang' => $request->input('jumlahbarang'),
                'harga_barang' => $request->input('hargabarang')
            ]);

        if ($query) {
            return redirect()->route('penjualan');
        }
    }

    public function deletedatapenjualan($id)
    {
        $query = DB::table('penjualans')
            ->where('id', $id)
            ->delete();

        if ($query) {
            return redirect()->route('penjualan');
        }
    }
}
