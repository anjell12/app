<?php

namespace Database\Seeders;

use App\Models\Desain;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            User::create(
    [
        'username' => 'dirga12',
        'email' => 'dirgafebriyanda12@gmail.com',
        'role' => 'User',
        'password' => bcrypt('password'),
    ]);
    
     Desain::create([
            'nama_pelanggan' => 'Asep Winarno',
            'jenis_produk' => 'Spanduk',
            'tinggi' => 10.5,
            'lebar' => 5.3,
            'harga' => 100000,
            'keterangan' => 'Keterangan Produk',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Budi Santoso',
            'jenis_produk' => 'Banner',
            'tinggi' => 7.2,
            'lebar' => 3.6,
            'harga' => 80000,
            'keterangan' => 'Deskripsi Banner',
            'status' => 'Sudah Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Citra Permata',
            'jenis_produk' => 'Flyer',
            'tinggi' => 5.0,
            'lebar' => 8.0,
            'harga' => 50000,
            'keterangan' => 'Informasi Flyer',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Dewi Susanti',
            'jenis_produk' => 'Brochure',
            'tinggi' => 15.0,
            'lebar' => 10.0,
            'harga' => 150000,
            'keterangan' => 'Deskripsi Brochure',
            'status' => 'Sudah Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Eko Setiawan',
            'jenis_produk' => 'Kartu Nama',
            'tinggi' => 9.0,
            'lebar' => 5.5,
            'harga' => 70000,
            'keterangan' => 'Informasi Kartu Nama',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Firman Cahyadi',
            'jenis_produk' => 'Poster',
            'tinggi' => 12.0,
            'lebar' => 8.5,
            'harga' => 120000,
            'keterangan' => 'Deskripsi Poster',
            'status' => 'Sudah Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Gita Wijaya',
            'jenis_produk' => 'Stiker',
            'tinggi' => 5.0,
            'lebar' => 5.0,
            'harga' => 30000,
            'keterangan' => 'Informasi Stiker',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Hana Kartika',
            'jenis_produk' => 'Brosur',
            'tinggi' => 8.5,
            'lebar' => 11.0,
            'harga' => 90000,
            'keterangan' => 'Deskripsi Brosur',
            'status' => 'Sudah Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Indra Permana',
            'jenis_produk' => 'Kaos',
            'tinggi' => 28.0,
            'lebar' => 18.0,
            'harga' => 250000,
            'keterangan' => 'Informasi Kaos',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'nama_pelanggan' => 'Joko Susilo',
            'jenis_produk' => 'Mug',
            'tinggi' => 10.0,
            'lebar' => 8.0,
            'harga' => 50000,
            'keterangan' => 'Deskripsi Mug',
            'status' => 'Sudah Desain',
        ]);
}
}
