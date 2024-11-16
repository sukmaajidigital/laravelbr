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
            $table->unsignedBigInteger('id_member');
            $table->text('catatan_transaksi')->nullable();
            $table->date('tanggal');
            $table->integer('total_harga_transaksi');
            $table->string('status_transaksi');
            $table->timestamps();

            // Foreign key untuk id_member
            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
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
