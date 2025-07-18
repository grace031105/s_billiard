<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaksi_pembayaran', function (Blueprint $table) {
             $table->dropForeign(['id_reservasi']);
        
           $table->dropColumn('id_reservasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_pembayaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_reservasi')->nullable();
            $table->foreign('id_reservasi')
                ->references('id_reservasi')
                ->on('reservasi')
                ->onDelete('cascade');
        });
    }
};
