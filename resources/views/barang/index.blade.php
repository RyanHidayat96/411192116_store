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
                <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm">Tambah Barang</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Stok Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barang as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->kode_barang }}</td>
                                <td>{{ $row->nama_barang }}</td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>{{ $row->stok_barang }}</td>
                                <td>{{ $row->harga_barang }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $row->id) }}" class="btn btn-sm btn-info shadow">
                                        Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('barang.destroy', $row->id) }}" method="post">
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
