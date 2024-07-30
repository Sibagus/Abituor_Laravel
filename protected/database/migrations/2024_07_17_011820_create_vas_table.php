<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vas', function (Blueprint $table) {
            $table->id();
            $table->dateTime("tanggal_invoice");
            $table->string("nomor_siswa");
            $table->string("nama");
            $table->integer("nominal_tagihan");
            $table->string("informasi");
            $table->string("nomor_jurnal_pembukuan");
            $table->dateTime("waktu_transaksi");
            $table->string("channel_pembayaran");
            $table->string("status_pembayaran");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vas');
    }
};
