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
                <form action="{{ route('desain.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Nama Pelanggan :</label>
                                <input type="text" class="form-control" value="{{ old('nama_pelanggan') }}"
                                    name="nama_pelanggan">
                            </div>
                            <div class="mb-3">
                                <label>Jenis Produk</label>
                                <input type="text" class="form-control" value="{{ old('jenis_produk') }}"
                                    name="jenis_produk">
                            </div>
                            <div class="mb-3">
                                <label>Tinggi :</label>
                                <input type="text" class="form-control" value="{{ old('tinggi') }}" name="tinggi">
                            </div>
                            <div class="mb-3">
                                <label>Lebar :</label>
                                <input type="text" class="form-control" value="{{ old('lebar') }}" name="lebar">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Harga :</label>
                                <input type="text" class="form-control" value="{{ old('harga') }}" name="harga">
                            </div>
                            <div class="mb-3">
                                <label>Keterangan :</label>
                                <textarea type="text" class="form-control" name="keterangan" cols="30" rows="5">{{ old('') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
