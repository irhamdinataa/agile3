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
        Schema::create('pengadaan_barangs', function (Blueprint $table) {
            $table->string('id');
            $table->string('namabarang');
            $table->integer('jumlah');
            $table->string('penanggung_jawab');
            $table->string('status');
            $table->primary('id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
