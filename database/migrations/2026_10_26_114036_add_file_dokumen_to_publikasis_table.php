<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up()
    {
        Schema::table('publikasis', function (Blueprint $table) {
            // Menambahkan kolom file_dokumen (nullable agar tidak wajib diisi)
            $table->string('file_dokumen')->nullable()->after('penerbit'); 
        });
    }

    public function down()
    {
        Schema::table('publikasis', function (Blueprint $table) {
            $table->dropColumn('file_dokumen');
        });
    }
};
