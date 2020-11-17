<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nhatuyendung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl:nhatuyendung', function (Blueprint $table) {
            $table->increments('nhatuyendung_id');
            $table->integer('user_id');
            $table->integer('doanhnghiep_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl:nhatuyendung');
    }
}
