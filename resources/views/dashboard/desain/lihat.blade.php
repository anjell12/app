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
                        Desain</a> / Lihat</h6>
                <p class="card-text"><small class="text-muted">{{ $desains->created_at->diffForHumans() }}</small>
                </p>
            </div>
            <div class="card-body">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 p-5">
                            <img src="{{ asset('img/default.png') }}" class="img-fluid rounded-start"
                                alt="{{ asset('img/default.png') }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $desains->nama_pelanggan }}</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="card-text">Produk : {{ $desains->jenis_produk }}</p>
                                        <p class="card-text">Tinggi : {{ $desains->tinggi }}cm</p>
                                        <p class="card-text">Lebar : {{ $desains->lebar }}cm</p>
                                        <p class="card-text">Harga : Rp. {{ $desains->harga }}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="card-text">Keterangan : {{ $desains->keterangan }}</p>
                                        <p class="card-text">Tanggal :
                                            {{ $desains->created_at->format('d F Y') }}</p>
                                        <p class="card-text">Status : {{ $desains->status }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
