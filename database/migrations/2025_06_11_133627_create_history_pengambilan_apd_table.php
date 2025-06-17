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
        Schema::create('history_pengambilan_apd', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal_pengambilan');
    $table->string('nik'); // relasi manual ke users
    $table->string('nama')->nullable(); // optional, bisa ditarik dari tabel users
    $table->string('jabatan');
    $table->string('departemen');
    $table->string('sepatu')->nullable();
    $table->string('helm')->nullable();
    $table->string('kacamata')->nullable();
    $table->string('masker')->nullable();
    $table->string('earplug')->nullable(); 
    $table->string('status_pengambilan'); // enum bisa: 'Masa Pergantian', 'Potong Gaji'
    $table->text('keterangan')->nullable();
    $table->integer('total_potongan')->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_pengambilan_apd');
    }
};
