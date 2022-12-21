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
                <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm">Tambah Pelanggan</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Pelanggan</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nama Kota</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggan as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->kode_pelanggan }}</td>
                                <td>{{ $row->nama_pelanggan }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->nama_kota }}</td>
                                <td>{{ $row->no_telepon }}</td>
                                <td>
                                    <a href="{{ route('pelanggan.edit', $row->id) }}" class="btn btn-sm btn-info shadow">
                                        Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('pelanggan.destroy', $row->id) }}" method="post">
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
