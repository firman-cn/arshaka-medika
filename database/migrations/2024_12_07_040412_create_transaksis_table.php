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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');

            $table->string('jumlah');
            $table->string('total');

            $table->unsignedBigInteger('obat');
            $table->unsignedBigInteger('pemeriksaan');
            $table->unsignedBigInteger('pasien');

            $table->foreign('obat')->references('id')->on('obats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pemeriksaan')->references('id')->on('pemeriksaans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pasien')->references('id')->on('pasiens')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
