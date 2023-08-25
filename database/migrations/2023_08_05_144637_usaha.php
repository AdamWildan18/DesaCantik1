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
        Schema::create('usaha', function (Blueprint $table) {
            $table->integer('kepemilikan_usaha')->nullable();
            $table->integer('internet_usaha')->nullable();
            $table->integer('jumlah_pekerja')->nullable();
            $table->integer('lapangan_usaha')->nullable();
            $table->integer('jumlah_usaha')->nullable();
            $table->integer('omset_usaha')->nullable();
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
