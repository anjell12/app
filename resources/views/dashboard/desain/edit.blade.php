@extends('dashboard.layouts.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between d-flex">
                <h6 class="m-0 font-weight-bold text-dark"><a href="{{ route('dashboard') }}"> <i
                            class="fas fa-fw fa-tachometer-alt"></i>
                        Dashboard</a> / <a href="{{ route('desain.index') }}">
                        Desain</a> / Tambah</h6>
                </p>
            </div>
            <div class="card-body">
                <form action="{{ route('desain.update', $desains->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Nama Pelanggan :</label>
                                <input type="text" class="form-control" name="nama_pelanggan"
                                    value="{{ old('nama_pelanggan', $desains->nama_pelanggan) }}">
                            </div>
                            <div class="mb-3">
                                <label>Jenis Produk</label>
                                <input type="text" class="form-control" name="jenis_produk"
                                    value="{{ old('jenis_produk', $desains->jenis_produk) }}">
                            </div>
                            <div class="mb-3">
                                <label>Tinggi :</label>
                                <input type="text" class="form-control" name="tinggi"
                                    value="{{ old('tinggi', $desains->tinggi) }}">
                            </div>
                            <div class="mb-3">
                                <label>Lebar :</label>
                                <input type="text" class="form-control" name="lebar"
                                    value="{{ old('lebar', $desains->lebar) }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Harga :</label>
                                <input type="text" class="form-control" name="harga"
                                    value="{{ old('harga', $desains->harga) }}">
                            </div>
                            <div class="mb-3">
                                <label>Keterangan :</label>
                                <textarea type="text" class="form-control" name="keterangan" cols="30" rows="5">{{ old('keterangan', $desains->keterangan) }}</textarea>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
