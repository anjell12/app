<?php

namespace Database\Seeders;

use App\Models\Desain;
use App\Models\Produk;
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
    
     Produk::create([
            'nama_produk' => 'Mug',
            'tinggi' => 10.0,
            'lebar' => 8.0,
            'harga' => 50000,
        ]);
     Desain::create([
        'produk_id' =>'1',
            'nama_pelanggan' => 'Asep Winarno',
            'tinggi' => 10.5,
            'lebar' => 5.3,
            'harga' => 100000,
            'keterangan' => 'Keterangan Produk',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Budi Santoso',
            'tinggi' => 7.2,
            'lebar' => 3.6,
            'harga' => 80000,
            'keterangan' => 'Deskripsi Banner',
            'status' => 'Sudah Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Citra Permata',
            'tinggi' => 5.0,
            'lebar' => 8.0,
            'harga' => 50000,
            'keterangan' => 'Informasi Flyer',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Dewi Susanti',
            'tinggi' => 15.0,
            'lebar' => 10.0,
            'harga' => 150000,
            'keterangan' => 'Deskripsi Brochure',
            'status' => 'Sudah Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Eko Setiawan',
            'tinggi' => 9.0,
            'lebar' => 5.5,
            'harga' => 70000,
            'keterangan' => 'Informasi Kartu Nama',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Firman Cahyadi',
            'tinggi' => 12.0,
            'lebar' => 8.5,
            'harga' => 120000,
            'keterangan' => 'Deskripsi Poster',
            'status' => 'Sudah Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Gita Wijaya',
            'tinggi' => 5.0,
            'lebar' => 5.0,
            'harga' => 30000,
            'keterangan' => 'Informasi Stiker',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Hana Kartika',
            'tinggi' => 8.5,
            'lebar' => 11.0,
            'harga' => 90000,
            'keterangan' => 'Deskripsi Brosur',
            'status' => 'Sudah Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Indra Permana',
            'tinggi' => 28.0,
            'lebar' => 18.0,
            'harga' => 250000,
            'keterangan' => 'Informasi Kaos',
            'status' => 'Belum Desain',
        ]);

        Desain::create([
            'produk_id' =>'1',
            'nama_pelanggan' => 'Joko Susilo',
            'tinggi' => 10.0,
            'lebar' => 8.0,
            'harga' => 50000,
            'keterangan' => 'Deskripsi Mug',
            'status' => 'Sudah Desain',
        ]);
       
}
}
