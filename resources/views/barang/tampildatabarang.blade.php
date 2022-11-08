<?php

use PharIo\Manifest\Url;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">CRUD Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/barang">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/penjualan">Penjualan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Body -->
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-bg-dark d-flex justify-content-between align-items-center">
                Edit Data Barang
                <a href="/barang" class="btn btn-info btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form action="/updatedatabarang/{{$data->id}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="row mb-3">
                        <label for="kodebarang" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kodebarang" id="kodebarang" value="{{ $data->kode_barang }}" autocomplete="off" required readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="namabarang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="namabarang" id="namabarang" value="{{ $data->nama_barang }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $data->deskripsi }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stokbarang" class="col-sm-2 col-form-label">Stok Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="stokbarang" id="stokbarang" value="{{ $data->stok_barang }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="hargabarang" class="col-sm-2 col-form-label">Harga Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hargabarang" id="hargabarang" value="{{ $data->harga_barang }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning btn-sm">Edit Data</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>