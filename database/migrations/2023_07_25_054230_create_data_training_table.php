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
        Schema::create('data_training', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('asalSekolah');
                $table->decimal('rataRapor', 5, 2);
                $table->integer('penghasilanOrtu');
                $table->integer('tanggunganOrtu');
                $table->text('riwayatOrganisasi')->nullable();
                $table->text('riwayatPrestasi')->nullable();
                $table->enum('KIP', [1, 2])->default(2); // 1=ya 2=tidak
                $table->enum('Klasifikasi', [1, 2]);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_training');
    }
};
