@extends('layouts.main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_pelanggan" class="form-label">Kode Pelanggan</label>
                        <input type="text" class="form-control @error('kode_pelanggan') is-invalid @enderror"
                            name="kode_pelanggan" id="kode_pelanggan"
                            value="{{ old('kode_pelanggan', $pelanggan->kode_pelanggan) }}">
                        @error('kode_pelanggan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror"
                            name="nama_pelanggan" id="nama_pelanggan"
                            value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}">
                        @error('nama_pelanggan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                            id="alamat" value="{{ old('alamat', $pelanggan->alamat) }}">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_kota" class="form-label">Nama Kota</label>
                        <input type="text" class="form-control @error('nama_kota') is-invalid @enderror" name="nama_kota"
                            id="nama_kota" value="{{ old('nama_kota', $pelanggan->nama_kota) }}">
                        @error('nama_kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                            name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $pelanggan->no_telepon) }}">
                        @error('no_telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
