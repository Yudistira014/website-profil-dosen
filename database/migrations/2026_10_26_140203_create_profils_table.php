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
            Schema::create('profils', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('universitas');
                $table->string('program_studi');
                $table->string('sinta_id');
                $table->string('bidang_keahlian');
                $table->text('deskripsi');
                $table->string('foto_profil')->nullable();
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
