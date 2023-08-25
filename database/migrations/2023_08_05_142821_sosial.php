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
        Schema::create('sosial', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('penduduk_id')->nullable();
            $table->string('bpnt')->nullable();
            $table->string('jaminan_kesehatan')->nullable();
            $table->string('pra_kerja')->nullable();
            $table->string('kur')->nullable();
            $table->string('ultra_mikro')->nullable();
            $table->string('pip')->nullable();
            $table->string('jaminan_ketenagakerjaan')->nullable();
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
