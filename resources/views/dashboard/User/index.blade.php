@extends('dashboard.layouts.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content -->
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-end mb-2">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between d-flex">
                <h6 class="m-0 font-weight-bold text-dark"><a href=""> <i class="fas fa-fw fa-tachometer-alt"></i>
                        Dashboard</a> / User</h6>
                <a href="{{ route('User.create') }}" class="btn btn-primary" title="Tambah"><i class="fas fa-plus"></i></a>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success" id="notif" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Tinggi</th>
                                <th>Lebar</th>
                                <th>Harga</th>
                                @auth
                                    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'IT' || auth()->user()->role == 'Owner')
                                        <th>Aksi</th>
                                    @endif
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $item->nama_produk }}</th>
                                    <th>{{ $item->tinggi }}</th>
                                    <th>{{ $item->lebar }}</th>
                                    <th>{{ $item->harga }}</th>
                                    @auth
                                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'IT' || auth()->user()->role == 'Owner')
                                            <th>
                                                <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning"
                                                    title="Edit"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('produk.destroy', $item->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk {{ $item->nama_produk }}?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </th>
                                        @endif
                                    @endauth
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Link pagination dengan tombol Previous dan Next disabled jika berada di halaman pertama atau terakhir -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item {{ $produks->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $produks->previousPageUrl() }}">Previous</a>
                            </li>
                            @foreach ($produks->getUrlRange(1, $produks->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $produks->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            <li class="page-item {{ $produks->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $produks->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
