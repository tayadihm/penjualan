<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterBayar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_bayar', function (Blueprint $table) {
            $table->string('no_bayar');
            $table->string('no_faktur');
            $table->string('no_psn');
            $table->date('tgl_psn');
            $table->date('tgl_bayar');
            $table->integer('jml_bayar');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('after_bayar');
    }
}
