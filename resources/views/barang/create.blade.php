@extends('layouts.main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('barang.index') }}" class="btn btn-warning btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('barang.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control @error('kode_barang') is-invalid @enderror"
                            name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}">
                        @error('kode_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                            name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                            id="deskripsi" value="{{ old('deskripsi') }}">
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stok_barang" class="form-label">Stok Barang</label>
                        <input type="text" class="form-control @error('stok_barang') is-invalid @enderror"
                            name="stok_barang" id="stok_barang" value="{{ old('stok_barang') }}">
                        @error('stok_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga_barang" class="form-label">Harga Barang</label>
                        <input type="text" class="form-control @error('harga_barang') is-invalid @enderror"
                            name="harga_barang" id="harga_barang" value="{{ old('harga_barang') }}">
                        @error('harga_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
