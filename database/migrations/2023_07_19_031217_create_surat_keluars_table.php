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
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->string('tujuan_surat');
            $table->string('isi');
            $table->string('kode');
            $table->date('tanggal_surat');
            $table->date('tanggal_catat');
            $table->string('perihal');
            $table->unsignedBigInteger('users_id');
            $table->string('lampiran');
            $table
                ->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
