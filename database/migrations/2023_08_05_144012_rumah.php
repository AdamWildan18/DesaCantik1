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
        Schema::create('rumah', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('keluarga_id')->nullable();
            $table->string('sts_kepemilikan')->nullable();
            $table->string('surat_kepemilikan')->nullable();
            $table->string('jenis_lantai')->nullable();
            $table->string('jenis_dinding')->nullable();
            $table->string('jenis_atap')->nullable();
            $table->string('air_minum')->nullable();
            $table->string('sumber_penerangan')->nullable();
            $table->string('daya_penerangan')->nullable();
            $table->string('bahan_masak')->nullable();
            $table->string('fasilitas_toilet')->nullable();
            $table->string('jenis_kloset')->nullable();
            $table->string('pembuangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
