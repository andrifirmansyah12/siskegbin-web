<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->nullable();
            $table->string('kegiatan', 255);
            $table->dateTime('tanggal');
            $table->string('deskripsi', 255);
            $table->string('foto')->nullable();
            $table->string('alamat', 255);
            $table->string('kelurahan', 255);
            $table->string('kecamatan', 255);
            $table->string('kabupaten', 255);
            $table->string('provinsi', 255);
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
        Schema::dropIfExists('pengajuan_kegiatans');
    }
}
