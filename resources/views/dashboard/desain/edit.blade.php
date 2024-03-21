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
                                    value="{{ old('nama_pelanggan', $desains->nama_pelanggan) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_produk">Produk</label>
                                <select name="produk_id" id="produk" class="form-control">
                                    <option value="" disabled>Pilih Produk</option>
                                    @foreach ($produk as $produk)
                                        <option value="{{ old('id', $produk->id) }}">
                                            {{ old('nama_produk', $produk->nama_produk) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Tinggi :</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tinggi" id="tinggi"
                                        value="{{ old('tinggi', $desains->tinggi) }}" required>
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Lebar :</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="lebar" id="lebar"
                                        value="{{ old('lebar', $desains->lebar) }}" required>
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input type="hidden" value="{{ old('harga', $produk->harga) }}" claass="form-control"
                                    id="hargaproduk" name="hargaproduk">
                                <label>Harga :</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control" name="harga" id="harga"
                                        value="{{ old('harga', $desains->harga) }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Keterangan :</label>
                                <textarea type="text" class="form-control" name="keterangan" cols="30" rows="8" required>{{ old('keterangan', $desains->keterangan) }}</textarea>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Perbarui</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const produk = document.getElementById('produk');
            const harga = document.getElementById('hargaproduk');

            produk.addEventListener('change', function() {
                const selectedProductId = produk.value;

                fetch(`/getHargaProduk/${selectedProductId}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Jika menggunakan CSRF protection
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            harga.value = data.harga;
                        } else {
                            harga.value = ''; // Reset harga jika tidak ada data yang ditemukan
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
    <script>
        // Ambil elemen tinggi, lebar, harga, dan total_harga dari HTML
        const tinggiInput = document.getElementById('tinggi');
        const lebarInput = document.getElementById('lebar');
        const hargaInput = document.getElementById('hargaproduk');
        const totalHargaInput = document.getElementById('harga');

        // Event listener untuk memantau perubahan pada input tinggi, lebar, dan harga
        tinggiInput.addEventListener('input', updateTotalHarga);
        lebarInput.addEventListener('input', updateTotalHarga);
        hargaInput.addEventListener('input', updateTotalHarga);

        // Fungsi untuk mengupdate total harga
        function updateTotalHarga() {
            const tinggi = parseFloat(tinggiInput.value) || 0; // Jika nilai tidak valid, gunakan 0
            const lebar = parseFloat(lebarInput.value) || 0;
            const harga = parseFloat(hargaInput.value) || 0;

            // Hitung total harga berdasarkan perhitungan tinggi + lebar x harga
            const luasSepanduk = tinggi * lebar;
            const hargaTotal = luasSepanduk * harga; // Menggunakan harga total, bukan harga per cm kuadrat

            // Tampilkan total harga pada input total_harga
            totalHargaInput.value = hargaTotal.toFixed(2); // Menampilkan total harga dengan 2 desimal
        }

        // Panggil fungsi updateTotalHarga saat halaman dimuat untuk pertama kali
        updateTotalHarga();
    </script>
@endsection
