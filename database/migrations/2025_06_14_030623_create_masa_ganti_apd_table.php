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
        Schema::create('masa_ganti_apd', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->string('departemen')->default('-');
            $table->integer('masa_helm');
            $table->integer('masa_sepatu');
            $table->integer('masa_kacamata');
            $table->integer('masa_masker');
            $table->integer('masa_earplug');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masa_ganti_apd');
    }
};
