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
        Schema::create('stok_apd', function (Blueprint $table) {
            $table->id();
            $table->string('kode_apd')->unique();     // ex: S-05, H-BIR
            $table->string('jenis_apd');              // ex: Sepatu No 5
            $table->string('kategori');               // ex: sepatu, helm
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_apd');
    }
};
