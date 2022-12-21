@extends('layouts.main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('penjualan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('penjualan.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="no_penjualan" class="form-label">No Penjualan</label>
                        <input type="text" class="form-control @error('no_penjualan') is-invalid @enderror"
                            name="no_penjualan" id="no_penjualan" value="{{ old('no_penjualan') }}">
                        @error('no_penjualan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                            name="tanggal" id="tanggal" value="{{ old('tanggal') }}">
                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_pelanggan" class="form-label">Nama Pelanggan</label>
                        <select class="form-select @error('kode_pelanggan') is-invalid @enderror" name="kode_pelanggan">
                            @foreach ($pelanggan as $item_p)
                                <option value="{{ $item_p->kode_pelanggan }}">{{ $item_p->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                        @error('kode_pelanggan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Nama Barang</label>
                        <select class="form-select @error('kode_barang') is-invalid @enderror" name="kode_barang">
                            @foreach ($barang as $item)
                                <option value="{{ $item->kode_barang }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('kode_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror"
                            name="jumlah_barang" id="jumlah_barang" value="{{ old('jumlah_barang') }}">
                        @error('jumlah_barang')
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
