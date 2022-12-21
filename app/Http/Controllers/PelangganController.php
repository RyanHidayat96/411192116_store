<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pelanggan' => Pelanggan::get(),
            'no' => 1
        ];

        return view('pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelangganRequest $request)
    {
        $this->validate($request, [
            'kode_pelanggan' => 'required|string|max:255',
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_kota' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
        ]);

        $query = Pelanggan::create([
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nama_kota' => $request->nama_kota,
            'no_telepon' => $request->no_telepon,
        ]);

        if ($query) {
            return redirect()->route('pelanggan.index')->with([
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
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'pelanggan' => Pelanggan::find($id),
        ];

        return view('pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, $id)
    {
        $this->validate($request, [
            'kode_pelanggan' => 'required|string|max:255',
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_kota' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
        ]);

        $query = Pelanggan::find($id);

        $query->update([
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nama_kota' => $request->nama_kota,
            'no_telepon' => $request->no_telepon,
        ]);

        if ($query) {
            return redirect()->route('pelanggan.index')->with([
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
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Pelanggan::find($id);
        $query->delete();

        if ($query) {
            return redirect()->route('pelanggan.index')->with([
                'success' => 'Item has been deleted successfully'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Some problem occurred, please try again'
            ]);
        }
    }
}
