<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'penjualan' => DB::table('penjualans')->join('barangs', 'penjualans.kode_barang', '=', 'barangs.kode_barang')->join('pelanggans', 'penjualans.kode_pelanggan', '=', 'pelanggans.kode_pelanggan')->get(),
            'no' => 1
        ];

        return view('penjualan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'barang' => Barang::all(),
            'pelanggan' => Pelanggan::all()
        ];
        return view('penjualan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenjualanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenjualanRequest $request)
    {
        $this->validate($request, [
            'no_penjualan' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'kode_pelanggan' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
        ]);

        $query = Penjualan::create([
            'no_penjualan' => $request->no_penjualan,
            'tanggal' => $request->tanggal,
            'kode_pelanggan' => $request->kode_pelanggan,
            'kode_barang' => $request->kode_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
        ]);

        if ($query) {
            return redirect()->route('penjualan.index')->with([
                'success' => 'New item has been created successfully'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Some problem occurred, please try again'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'penjualan' => Penjualan::find($id),
        ];

        return view('penjualan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjualanRequest  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjualanRequest $request, $id)
    {
        $this->validate($request, [
            'no_penjualan' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'kode_pelanggan' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
        ]);

        $query = Penjualan::find($id);

        $query->update([
            'no_penjualan' => $request->no_penjualan,
            'tanggal' => $request->tanggal,
            'kode_pelanggan' => $request->kode_pelanggan,
            'kode_barang' => $request->kode_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
        ]);

        if ($query) {
            return redirect()->route('penjualan.index')->with([
                'success' => 'Item has been updated successfully'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Some problem occurred, please try again'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Penjualan::find($id);
        $query->delete();

        if ($query) {
            return redirect()->route('penjualan.index')->with([
                'success' => 'Item has been deleted successfully'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Some problem occurred, please try again'
            ]);
        }
    }
}
