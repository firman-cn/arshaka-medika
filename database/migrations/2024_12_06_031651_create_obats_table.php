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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_obat');    

            $table->string('nama_obat');    
            $table->string('harga_beli');
            $table->string('harga_jual');
            $table->string('jenis_obat');

            
            $table->string('gambar_obat')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
