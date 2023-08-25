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
        Schema::create('program', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('keluarga_id');
            $table->string('bpnt');
            $table->date('tanggal_bpnt');
            $table->string('pkh');
            $table->date('tanggal_pkh');
            $table->string('blt');
            $table->date('tanggal_blt');
            $table->string('subsidi_listrik');
            $table->date('tanggal_subsidi_listrik');
            $table->string('subsidi_pupuk');
            $table->date('tanggal_subsidi_pupuk');
            $table->string('subsidi_lpg');
            $table->date('tanggal_subsidi_lpg');
            $table->string('tabung_gas');
            $table->string('kulkas');
            $table->string('ac');
            $table->string('water_heater');
            $table->string('telepon_rumah');
            $table->string('tv');
            $table->string('perhiasan');
            $table->string('komputer_laptop_tablet');
            $table->string('motor');
            $table->string('sepeda');
            $table->string('mobil');
            $table->string('hp');
            $table->string('lahan_lain');
            $table->string('bangunan_lain');
            $table->string('sapi');
            $table->string('kerbau');
            $table->string('kuda');
            $table->string('kambing');
            $table->string('akses_internet');
            $table->string('rekening_dompetdigital');
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
