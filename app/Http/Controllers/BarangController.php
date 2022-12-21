<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'barang' => Barang::get(),
            'no' => 1
        ];

        return view('barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        $this->validate($request, [
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'stok_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
        ]);

        $query = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok_barang' => $request->stok_barang,
            'harga_barang' => $request->harga_barang,
        ]);

        if ($query) {
            return redirect()->route('barang.index')->with([
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
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'barang' => Barang::find($id),
        ];

        return view('barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, $id)
    {
        $this->validate($request, [
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'stok_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
        ]);

        $query = Barang::find($id);

        $query->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok_barang' => $request->stok_barang,
            'harga_barang' => $request->harga_barang,
        ]);

        if ($query) {
            return redirect()->route('barang.index')->with([
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
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Barang::find($id);
        $query->delete();

        if ($query) {
            return redirect()->route('barang.index')->with([
                'success' => 'Item has been deleted successfully'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Some problem occurred, please try again'
            ]);
        }
    }
}
