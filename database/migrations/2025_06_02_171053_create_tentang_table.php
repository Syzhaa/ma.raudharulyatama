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
        Schema::create('tentang', function (Blueprint $table) {
            $table->id();
            $table->text('profil_ma_raudhatul_yatama');
            $table->text('visi');
            $table->text('misi');
            $table->text('tujuan_pendidikan');
            $table->text('staf_pengajar')->nullable();
            $table->text('kegiatan_keislaman')->nullable();
            $table->text('fasilitas_penunjang')->nullable();
            $table->string('lokasi_judul')->nullable();
            $table->text('lokasi_iframe_gmaps')->nullable();
            $table->text('kontak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tentang');
    }
};
