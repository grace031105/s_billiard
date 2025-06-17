<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('riwayat_penyewaan', function (Blueprint $table) {
        $table->id();
        $table->string('resi');
        $table->string('tipe');
        $table->date('tanggal');
        $table->timestamps(); // created_at dan updated_at otomatis
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penyewaan');
    }
};
