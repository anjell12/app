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
                        Desain</a> / Edit</h6>
                </p>
            </div>
            <div class="card-body">
                <form action="{{ route('desain.update', $desains->id) }}" method="POST">
                    @csrf
                    @method('put')
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
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tinggi"
                                        value="{{ old('tinggi', $desains->tinggi) }}">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Lebar :</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="lebar"
                                        value="{{ old('lebar', $desains->lebar) }}">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Harga :</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control" name="harga"
                                        value="{{ old('harga', $desains->harga) }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Keterangan :</label>
                                <textarea type="text" class="form-control" name="keterangan" cols="30" rows="8">{{ old('keterangan', $desains->keterangan) }}</textarea>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Perbarui</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
