<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $data = DB::table('barangs')->where('stok_barang', '>', 0)->get();
        return view('barang/barang', compact('data'));
    }

    public function tambahdatabarang()
    {
        return view('barang/tambahdatabarang');
    }

    public function insertdatabarang(Request $request)
    {
        // dd($request->all());
        $query = DB::table('barangs')->insert([
            'kode_barang' => $request->input('kodebarang'),
            'nama_barang' => $request->input('namabarang'),
            'deskripsi' => $request->input('deskripsi'),
            'stok_barang' => $request->input('stokbarang'),
            'harga_barang' => $request->input('hargabarang')
        ]);

        if ($query) {
            return redirect()->route('barang');
        }
    }

    public function tampildatabarang($id)
    {
        $data = Barang::find($id);
        // dd($data);

        return view('barang/tampildatabarang', compact('data'));
    }

    public function updatedatabarang(Request $request)
    {
        $query = DB::table('barangs')
            ->where('id', $request->input('id'))
            ->update([
                'kode_barang' => $request->input('kodebarang'),
                'nama_barang' => $request->input('namabarang'),
                'deskripsi' => $request->input('deskripsi'),
                'stok_barang' => $request->input('stokbarang'),
                'harga_barang' => $request->input('hargabarang')
            ]);

        if ($query) {
            return redirect()->route('barang');
        }
    }

    public function deletedatabarang($id)
    {
        $query = DB::table('barangs')
            ->where('id', $id)
            ->delete();

        if ($query) {
            return redirect()->route('barang');
        }
    }
}
