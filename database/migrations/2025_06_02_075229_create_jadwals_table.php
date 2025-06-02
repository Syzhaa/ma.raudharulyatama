<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id(); // Kolom ID auto-increment
            $table->string('gambar'); // Kolom untuk menyimpan path atau nama file gambar
            $table->date('tanggal'); // Kolom untuk menyimpan tanggal
            $table->enum('kelas', ['10', '11', '12']); // Kolom untuk pilihan kelas
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
};
