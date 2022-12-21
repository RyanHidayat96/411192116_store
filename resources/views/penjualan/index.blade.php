@extends('layouts.main')

@section('content')
    {{-- Section Content --}}
    <div class="container mt-5">
        <!-- Notifikasi menggunakan flash session data -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('penjualan.create') }}" class="btn btn-primary btn-sm">Tambah penjualan</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode penjualan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penjualan as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->no_penjualan }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ $row->nama_pelanggan }}</td>
                                <td>{{ $row->nama_barang }}</td>
                                <td>{{ $row->jumlah_barang }}</td>
                                <td>{{ $row->harga_barang }}</td>
                                <td>
                                    <a href="{{ route('penjualan.edit', $row->id) }}" class="btn btn-sm btn-info shadow">
                                        Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('penjualan.destroy', $row->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Content --}}
@endsection
