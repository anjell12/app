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
                        Dashboard</a> / <a href="{{ route('produk.index') }}">
                        Produk</a> / Tambah</h6>
                </p>
            </div>
            <div class="card-body">
                <form action="{{ route('produk.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" value="{{ old('nama_produk') }}"
                                    name="nama_produk">
                            </div>
                            <div class="mb-3">
                                <label>Tinggi :</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('tinggi') }}" name="tinggi">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Lebar :</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ old('lebar') }}" name="lebar">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Harga :</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control" value="{{ old('harga') }}" name="harga">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Simpan</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
