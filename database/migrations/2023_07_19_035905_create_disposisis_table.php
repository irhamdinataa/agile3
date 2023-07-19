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
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan');
            $table->string('isi');
            $table->string('sifat');
            $table->date('batas_waktu');
            $table->string('catatan');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('suratmasuk_id');
            $table->timestamps();
            $table
                ->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table
                ->foreign('suratmasuk_id')
                ->references('id')
                ->on('surat_masuks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisis');
    }
};
