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
        Schema::create('history_lelangs', function (Blueprint $table) {
            $table->id('id_history');

            $table->unsignedbigInteger('id_lelang');
            $table->foreign('id_lelang')->references('id_lelang')->on('lelangs')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedbigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedbigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('penawaran_harga');
            $table->timestamps();
        });
    }

/**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_lelangs');
    }
};
