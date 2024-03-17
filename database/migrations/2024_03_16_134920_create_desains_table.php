<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desains', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('jenis_produk');
            $table->float('tinggi');
            $table->float('lebar');
            $table->decimal('harga', 10, 2);
            $table->text('keterangan')->nullable();
            $table->enum('status',['Belum Desain', 'Sudah Desain', 'Sudah Cetak'])->default('Belum Desain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desains');
    }
}
