<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BangCap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl:BangCap', function (Blueprint $table) {
            $table->increments('bangcap_id');
            $table->integer('ungvien_id');
            $table->string('bangcap_ten');
            $table->string('bangcap_NoiDaoTao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl:BangCap');
    }
}
