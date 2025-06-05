<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanans extends Model
{
    public function up()
{
    Schema::create('pemesanans', function (Blueprint $table) {
        $table->id();
        $table->string('kode_resi');
        $table->string('nama_pelanggan');
        $table->string('tipe_meja');
        $table->integer('no_meja');
        $table->date('tanggal');
        $table->string('waktu');
        $table->integer('total_harga');
        $table->timestamps();
    });
}
}
