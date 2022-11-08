<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        $data = DB::table('pelanggans')
            ->where('nama_kota', 'Jakarta')
            ->get();
        return view('pelanggan/pelanggan', compact('data'));
    }

    public function tambahdatapelanggan()
    {
        return view('pelanggan/tambahdatapelanggan');
    }

    public function insertdatapelanggan(Request $request)
    {
        // dd($request->all());
        $query = DB::table('pelanggans')->insert([
            'kode_pelanggan' => $request->input('kodepelanggan'),
            'nama_pelanggan' => $request->input('namapelanggan'),
            'alamat' => $request->input('alamat'),
            'nama_kota' => $request->input('namakota'),
            'no_telepon' => $request->input('notelepon')
        ]);

        if ($query) {
            return redirect()->route('pelanggan');
        }
    }

    public function tampildatapelanggan($id)
    {
        $data = pelanggan::find($id);
        // dd($data);

        return view('pelanggan/tampildatapelanggan', compact('data'));
    }

    public function updatedatapelanggan(Request $request)
    {
        $query = DB::table('pelanggans')
            ->where('id', $request->input('id'))
            ->update([
                'kode_pelanggan' => $request->input('kodepelanggan'),
                'nama_pelanggan' => $request->input('namapelanggan'),
                'alamat' => $request->input('alamat'),
                'nama_kota' => $request->input('namakota'),
                'no_telepon' => $request->input('notelepon')
            ]);

        if ($query) {
            return redirect()->route('pelanggan');
        }
    }

    public function deletedatapelanggan($id)
    {
        $query = DB::table('pelanggans')
            ->where('id', $id)
            ->delete();

        if ($query) {
            return redirect()->route('pelanggan');
        }
    }
}
