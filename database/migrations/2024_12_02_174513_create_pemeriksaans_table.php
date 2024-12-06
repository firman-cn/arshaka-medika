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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('pelayanan');

            $table->unsignedBigInteger('pasien');
 
            $table->foreign('pasien')->references('id')->on('pasiens')->onDelete('cascade')->onUpdate('cascade');
      

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};